<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // فراخوانی میدلورها
    public function __construct()
    {
        // فقط رو تابع ایندکس وجود دسترسی خواندن دسته بندی را چک کن
        // $this->middleware("permission:read-user")
        //    ->only('index');


        // $this->middleware("permission:delete-user")
        //    ->only('destroy');
    }

    public function index()
    {
        // Seve all users in a $users
        $users = User::all();

        return view('users.index', [
           'users' => $users
        ]);
    }

    // برگرداندن اطلاعات و رول های کاربر به این صفحه
    public function edit(User $user)
    {
        // برگرداندن رول های کاربر
        $roles = Role::all();

        return view('users.edit', [
            'users' => $user,
            'roles' => $roles
        ]);
    }



    public function update(Request $request, User $user)
    {

        // update($request->validated()) =>  درخواست ها یا متغیر هایی که از اعتبارسنجی ها عبور کردند را در فیلد آپدیتمان وارد می کند و دیگه نمی خواد تکی تکی آنها را خودمان آپدیت کنیم
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
