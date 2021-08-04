<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRoleRequest;
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
        return view('roles.create');
    }

    public function store(NewRoleRequest $request)
    {
        Role::query()->create([
            'title' => $request->get('title')
        ]);

        return redirect('/roles');
    }
}
