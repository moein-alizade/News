<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    // post with category = 1 to n
    public function posts()
    {
        // یک دسته بندی تعداد زیادی پست دارد
        return $this->hasMany(Post::class);
    }
}
