<?php

class CreateArticlesTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE articles (
                id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                image       VARCHAR(500),
                title       VARCHAR(255) NOT NULL,
                description TEXT,
                body        LONGTEXT NOT NULL,
                views       INT UNSIGNED NOT NULL DEFAULT 0,
                created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS articles");
    }
}
