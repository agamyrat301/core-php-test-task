<?php

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $stmt = $this->db->prepare(
            "INSERT INTO categories (name, description) VALUES (:name, :description)"
        );

        foreach ($this->data() as $row) {
            $stmt->execute($row);
        }
    }

    private function data(): array
    {
        return [
            ['name' => 'Technology', 'description' => 'Tech news, gadgets, and software.'],
            ['name' => 'Science',    'description' => 'Scientific research and discoveries.'],
            ['name' => 'Sports',     'description' => 'Football, basketball, and more.'],
            ['name' => 'Politics',   'description' => 'Local and world political news.'],
            ['name' => 'Culture',    'description' => 'Arts, cinema, music, and literature.'],
            ['name' => 'test',    'description' => 'test1'],
        ];
    }
}
