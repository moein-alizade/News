<?php

namespace App\Http\Controllers;

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
}
