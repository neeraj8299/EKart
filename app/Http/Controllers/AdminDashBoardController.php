<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminDashBoardController extends Controller
{

    public function __construct()
    {
        $this->data['is_admin'] = 'yes';
    }

    public function dashboardView()
    {
        $this->data['products'] = Product::getAllProducts();
        return view('dashboard', $this->data);
    }
}
