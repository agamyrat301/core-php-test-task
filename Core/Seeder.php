<?php

abstract class Seeder
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    abstract public function run(): void;

    protected function call(string $seederClass): void
    {
        require_once BASE_PATH . '/database/seeders/' . $seederClass . '.php';
        (new $seederClass($this->db))->run();
        echo "Seeded:  {$seederClass}\n";
    }
}
