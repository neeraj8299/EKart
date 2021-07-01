<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $this->data['is_admin'] = 'yes';
        return view('add-users', $this->data);
    }

    public function store(Request $request, RegisteredUserController $user)
    {
        $user->store($request);

        return redirect()->back();
    }
}
