<?php

namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use App\Permission;


use Illuminate\Http\Request;

class PermissionController extends Controller
{
 	public function index(Permission $permission)
    {

        $permissions = $permission->all();

        return view('painel.permissions.index', compact('permissions'));
    }


    public function roles(Permission $permission,$id)
    {

        $permissions = $permission->find($id);

        $roles = $permissions->roles()->get();

        return view('painel.permissions.roles', compact('roles','permissions'));
    }




}
