<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('authenticate.create',[
            'roles' => Role::all()
        ]);
    }

    public function store(RegisterRequest $request)
    {
//        dd($request->all());

        $user = User::query()->create([
           'name' => $request->get('name') ,
           'email' => $request->get('email') ,
           'mobile' => $request->get('mobile') ,
            // Save user password with hashing code and not real user password
           'password' => bcrypt($request->get('password')),

            // توی مدل (همان جدول) رول برو و اونی که اسمش برابر با کلاینت هست آنگاه آیدی
            // ذخیره کن 'role_id' اولین رکوردش را در فیلد
            'role_id' => Role::where('title', '=', 'client')->first()->id,
        ]);


// لاگین کردن کاربر بعد از ثبت نام
        auth()->login($user);

        return redirect('/');
    }
}
