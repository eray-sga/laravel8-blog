<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<4;$i++)
        {
            DB::table('articles')->insert([
                'category_id'=>rand(1,7),
                'title'=>$faker->title,
                'image'=>$faker->imageUrl($width, $height, 'cats', true, 'Faker', true),
                'content'=>$faker->text,
                'slug'=>Str::slug($faker->title),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
