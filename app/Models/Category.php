<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //bir kategoriye ait birden fazla yazı olabilir o yüzden hasMany ilişkisi
    public function articleCount()
    {
        return $this->hasMany(Article::class,'category_id','id')->where('status',1)->count();
                        //Bağlanacağımız model //bağlanacağımız sütun //bağlanacak id
    }
    
}
