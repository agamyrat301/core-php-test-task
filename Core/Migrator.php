<?php

class Migrator
{
    private PDO    $db;
    private string $path;

    public function __construct(PDO $db)
    {
        $this->db   = $db;
        $this->path = BASE_PATH . '/database/migrations';
    }

    public function migrate(): void
    {
        $this->ensureMigrationsTable();

        $pending = array_diff($this->getFiles(), $this->getRan());

        if (empty($pending)) {
            echo "Nothing to migrate.\n";
            return;
        }

        $batch = $this->getNextBatch();

        foreach ($pending as $file) {
            $this->runUp($file, $batch);
            echo "Migrated: {$file}\n";
        }
    }

    public function rollback(): void
    {
        $this->ensureMigrationsTable();

        $lastBatch = $this->getLastBatch();

        if ($lastBatch === null) {
            echo "Nothing to rollback.\n";
            return;
        }

        $stmt = $this->db->prepare(
            "SELECT migration FROM migrations WHERE batch = :batch ORDER BY id DESC"
        );
        $stmt->execute([':batch' => $lastBatch]);

        foreach ($stmt->fetchAll(PDO::FETCH_COLUMN) as $file) {
            $this->runDown($file);
            $this->db->prepare("DELETE FROM migrations WHERE migration = :m")
                     ->execute([':m' => $file]);
            echo "Rolled back: {$file}\n";
        }
    }

    public function fresh(): void
    {
        $this->db->exec('SET FOREIGN_KEY_CHECKS = 0');
        foreach ($this->db->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN) as $table) {
            $this->db->exec("DROP TABLE IF EXISTS `{$table}`");
        }
        $this->db->exec('SET FOREIGN_KEY_CHECKS = 1');
        echo "Dropped all tables.\n";

        $this->migrate();
    }

    private function runUp(string $file, int $batch): void
    {
        $this->load($file);
        (new ($this->className($file))($this->db))->up();

        $this->db->prepare("INSERT INTO migrations (migration, batch) VALUES (:m, :b)")
                 ->execute([':m' => $file, ':b' => $batch]);
    }

    private function runDown(string $file): void
    {
        $this->load($file);
        (new ($this->className($file))($this->db))->down();
    }

    private function load(string $file): void
    {
        require_once $this->path . '/' . $file;
    }

    private function ensureMigrationsTable(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS migrations (
                id        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255) NOT NULL,
                batch     INT NOT NULL,
                run_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }

    private function getFiles(): array
    {
        $files = array_map('basename', glob($this->path . '/*.php') ?: []);
        sort($files);
        return $files;
    }

    private function getRan(): array
    {
        return $this->db->query("SELECT migration FROM migrations")
                        ->fetchAll(PDO::FETCH_COLUMN);
    }

    private function getLastBatch(): ?int
    {
        $val = $this->db->query("SELECT MAX(batch) FROM migrations")->fetchColumn();
        return $val !== false ? (int) $val : null;
    }

    private function getNextBatch(): int
    {
        return ($this->getLastBatch() ?? 0) + 1;
    }

    private function className(string $filename): string
    {
        $name = preg_replace('/^\d{4}_\d{2}_\d{2}_\d{6}_/', '', pathinfo($filename, PATHINFO_FILENAME));
        return str_replace('_', '', ucwords($name, '_'));
    }
}
