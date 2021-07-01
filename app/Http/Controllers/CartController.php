<?php

namespace App\Http\Controllers;

use App\Models\UserCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $this->data['cart_items'] = $data = UserCart::getCartData();

        $this->data['total'] =0;
        foreach($data as $row){
            $this->data['total']  = $this->data['total'] + $row->quantity*$row->price;
        }
        return view('cart', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required'
        ]);
        UserCart::addToCart($request->product_id);

        return redirect()->intended('/cart')->with('message', "Item Added To Cart");
    }
}
