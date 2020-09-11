<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\MyArticlesFactory;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MyArticlesFactory::new()->count(10)->create();
    }
}
