<?php

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call('CategorySeeder');
        $this->call('ArticleSeeder');
    }
}
