<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    //bire bir ilişki one to one her yazının bir kategorisi var
    public function Category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
