<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // فیلدهایی که توسط کاربر قابل مقداردهی هستند (خوش بینانه)
    //    protected $fillable = [
    //        'slug', 'title', 'body'
    //    ];

    // فیلدهایی که توسط کاربر قابل مقداردهی نیستند (بد بینانه)
    protected $guarded = [];

    // تغییر فیلد موردنظر در روت مدل بایدینگ
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
