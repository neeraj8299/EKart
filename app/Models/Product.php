<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $table = 'products';

    public static function getAllProducts()
    {
        $data = Product::all()->groupBy('fk_category_id');
        $result = [];

        foreach ($data as $key => $value) {
            $name = Category::find($key)->name;
            $result[$name] = $value;
        }
        return $result;
    }
}
