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


    public function store(LoginRequest $request)
    {
        $user = User::query()
            ->where('mobile', $request->get('mobile'))
            ->firstOrFail();

        if (! Hash::check($request->get('password'), $user->password))
        {
            return back()->withErrors(['password' => 'password is wrong']);
        }

        auth()->login($user);
        return redirect('/');

    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
