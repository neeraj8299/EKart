<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $this->data['is_admin'] = 'yes';
        return view('category', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string|unique:categories'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('message', $request->name.' Categories Created Succesfully');
    }
}
