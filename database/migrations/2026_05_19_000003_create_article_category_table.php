<?php

class CreateArticleCategoryTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE article_category (
                article_id  INT UNSIGNED NOT NULL,
                category_id INT UNSIGNED NOT NULL,
                PRIMARY KEY (article_id, category_id),
                FOREIGN KEY (article_id)  REFERENCES articles(id)   ON DELETE CASCADE,
                FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
            )
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS article_category");
    }
}
