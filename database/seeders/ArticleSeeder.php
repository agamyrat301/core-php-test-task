<?php

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $insert = $this->db->prepare("
            INSERT INTO articles (image, title, description, body, views)
            VALUES (:image, :title, :description, :body, :views)
        ");

        $pivot = $this->db->prepare(
            "INSERT INTO article_category (article_id, category_id) VALUES (:article_id, :category_id)"
        );

        foreach ($this->data() as $row) {
            $categories = $row['categories'];
            unset($row['categories']);

            $insert->execute($row);
            $articleId = (int) $this->db->lastInsertId();

            foreach ($categories as $categoryId) {
                $pivot->execute([':article_id' => $articleId, ':category_id' => $categoryId]);
            }
        }
    }

    private function data(): array
    {
        return [
            [
                'image'       => null,
                'title'       => 'Getting Started with PHP',
                'description' => 'A beginner-friendly introduction to PHP.',
                'body'        => 'PHP is a widely-used open-source scripting language especially suited for web development.',
                'views'       => 240,
                'categories'  => [1],
            ],
            [
                'image'       => null,
                'title'       => 'James Webb Telescope Discoveries',
                'description' => 'What the Webb telescope has revealed so far.',
                'body'        => 'Since its launch, the James Webb Space Telescope has sent back stunning images of distant galaxies.',
                'views'       => 512,
                'categories'  => [2],
            ],
            [
                'image'       => null,
                'title'       => 'Champions League Final Preview',
                'description' => 'Everything you need to know before the big match.',
                'body'        => 'Two of Europe\'s finest clubs face off in what promises to be a thrilling Champions League final.',
                'views'       => 890,
                'categories'  => [3],
            ],
            [
                'image'       => null,
                'title'       => 'AI in Politics: Promise or Threat?',
                'description' => 'How artificial intelligence is reshaping political campaigns.',
                'body'        => 'Governments and campaigns are increasingly turning to AI tools for voter analysis and messaging.',
                'views'       => 310,
                'categories'  => [1, 4],
            ],
            [
                'image'       => null,
                'title'       => 'The Rise of Indie Cinema',
                'description' => 'Independent films are gaining mainstream attention.',
                'body'        => 'Low-budget productions with strong storytelling are winning awards and building loyal audiences.',
                'views'       => 175,
                'categories'  => [5],
            ],
        ];
    }
}
