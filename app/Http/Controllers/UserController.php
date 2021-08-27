<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', [
           'users' => $users
        ]);
    }


    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', [
            'users' => $user,
            'roles' => $roles
        ]);
    }



    public function update(Request $request, User $user)
    {
        $user->update([
            'role_id' => $request->get('role_id'),
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
        ]);

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
