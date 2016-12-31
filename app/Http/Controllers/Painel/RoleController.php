<?php

namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use App\Role;


use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Role $role)
    {

        $roles = $role->all();

        return view('painel.roles.index', compact('roles'));
    }


    public function permissions(Role $role,$id)
    {

        $roles = $role->find($id);

        $permissions = $roles->permissions()->get();

        return view('painel.roles.permissions', compact('roles','permissions'));
    }
}
