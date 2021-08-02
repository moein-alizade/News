<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('authenticate.create');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::query()->create([
           'name' => $request->get('name') ,
           'email' => $request->get('email') ,
           'mobile' => $request->get('mobile') ,
            // Save user password with hashing code and not real user password
           'password' => bcrypt($request->get('password')) ,
        ]);


// لاگین کردن کاربر بعد از ثبت نام
        auth()->login($user);

        return redirect('/');
    }
}
