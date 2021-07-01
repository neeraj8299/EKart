<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $this->data['profile'] = User::getProfile();
        return view('profile', $this->data);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        \DB::table('users')->update(['password' => Hash::make($request->password), 'updated_at' => Carbon::now()]);

        return redirect()->back()->with('message', "Password Updated Successfully");
    }

    public function sendLink()
    {
        $user = auth()->user();
        event(new Registered($user));

        return redirect()->back()->with('message', "Verification Link Has Been Sent To You On Mail");
    }
}
