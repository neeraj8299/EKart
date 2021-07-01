<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public static function getAllCategory()
    {
        $data = Category::orderBy('name')->pluck('name','id');
        return $data;
    }
}
