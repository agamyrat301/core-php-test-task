<?php

class CreateCategoriesTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE categories (
                id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name        VARCHAR(255) NOT NULL,
                description TEXT,
                created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS categories");
    }
}
