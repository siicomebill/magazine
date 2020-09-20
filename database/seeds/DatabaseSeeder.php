<?php

use Database\Seeders\ArticleSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
        ]);

        if(env('APP_ENV') != 'production'){
            $this->call([
                UserSeeder::class,
                ArticleSeeder::class,
            ]);
        }
    }
}
