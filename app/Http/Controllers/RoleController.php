<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
   // show list roles
    public function index()
    {
        // نمایش لیست همه ی نقش ها
        return view('roles.index',[
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        // permission pass to roles.create view
        return view('roles.create', [
            'permissions' => Permission::all()
        ]);
    }

    public function store(NewRoleRequest $request)
    {
        // آیدی های دسترسی های مد نظرمان در داخل این آرایه دسترسی ها هستند
        // dd($request->get('permissions'));


        $role = Role::query()->create([
            'title' => $request->get('title')

        ]);

        // اختصاص دادن دسترسی ها به این نقشی که ایجاد کردیم
        // permissions() => رابطه ای که توی مدل نقش تعریف کردیم
        // attach() =>  دسترسی هایی که سمت دیتابیس مان بعنوان دسترسی های این رول فرستادیم برای اون رول خاص اضافه می شوند
        $role->permissions()->attach($request->get('permissions'));

        return redirect('/roles');
    }

    public function edit(Role $role)
    {
        // پاس دادن ویژگی ها به صفحه  ویرایش نقش ها
        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }


    public function update(NewRoleRequest $request, Role $role)
    {
        $role->update([
           'title' => $request->get('title')
        ]);

        // Update permissions
        // sync() => هم اضافه می کند و هم حذف می کند یعنی کل تغییرات را برای ما مدیریت می کند
        $role->permissions()->sync($request->get('permissions'));

        return redirect('/roles');
    }


    public function destroy(Role $role)
    {
        // گرفتن یا غیرفعال کردن دسترسی های این رول تا بشود آنرا حذف کنیم
        // delete() => حذف می کند permissions ققط از جدول
        // detach() => از جدول میانی که تعریف کردیم یک سری رکورد ها را طبق چیزی که دادیم برای ما حذف می کند (permission_role)
        $role->permissions()->detach();

        $role->delete();

        return redirect('/roles');

    }
}
