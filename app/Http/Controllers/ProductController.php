<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $this->data['categories'] = Category::getAllCategory();
        return view('products', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:products,title',
            'description' => 'required|min:10',
            'price' => 'required',
            'category' => 'required',
            'images' => 'required|max:2048'
        ]);

        $path = $request->file('images')->store("products");

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'fk_category_id' => (int) $request->category,
            'image_filepath' => $path
        ]);

        return redirect()->back()->with('message', $request->title . ' Product Created Succesfully');
    }

    public function edit()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
