<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    // بازیابی کاربر
    public function store(LoginRequest $request)
    {
        // نمایش دادن اولین کاربر با این موبایل
        $user = User::query()
            ->where('mobile', $request->get('mobile'))
            ->firstOrFail();

        // برای نمایش اطلاعات کاربر
        // dd($user->toArray());

        // چک کردن رمز ورودی کاربر با رمز واقعی اش
        if (! Hash::check($request->get('password'), $user->password))
        {
            // key => 'password' = برای مشخص کردن فیلدی که ایراد دارد هست
            return back()->withErrors(['password' => 'password is wrong']);
        }

        // لاگین کردن کاربر
        auth()->login($user);

        return redirect('/');

    }

    // logout
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
