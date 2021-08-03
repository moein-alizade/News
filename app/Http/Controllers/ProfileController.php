<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        if (!auth()->check())
        {
            abort('401');
        }
        // نمایش اطلاعات کاربر فعلی که لاگین کرده است
        return view('profile.show',[
           'user' => auth()->user()
        ]);
    }

    public function edit()
    {
        return view('profile.edit', [
           'user' => auth()->user()
        ]);
    }


    public function update(ProfileUpdateRequest $request)
    {
        auth()->user()->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
        ]);

        return redirect('/profile');
    }
}
