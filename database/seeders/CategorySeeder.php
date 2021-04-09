<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Genel','Eğlence','Bilişim','Gezi','Teknoloji','Sağlık','Spor','Günlük Yaşam'];
        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>Str::slug($category),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
        
    }
}
