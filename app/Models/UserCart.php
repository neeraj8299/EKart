<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    protected $guarded = [];
    protected $table = 'user_carts';

    public static function addToCart($product_id)
    {
        $cart = UserCart::firstOrNew([
            'fk_user_id' => auth()->id(),
            'fk_product_id' => $product_id
        ]);

        if ($cart->exists()) {
            $cart->quantity += 1;
        }
        $cart->save();
    }

    public static function getCartData()
    {
        return UserCart::join('products', 'products.id', 'fk_product_id')
            ->select('products.title', 'products.image_filepath', 'products.description' ,'products.price' , 'user_carts.quantity')
            ->where('fk_user_id', auth()->id())
            ->get();
    }
}
