<?php

namespace Database\Seeders;

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
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ConfigSeeder::class);
    }
}
