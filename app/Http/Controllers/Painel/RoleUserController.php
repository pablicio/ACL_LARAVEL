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


    public function create()
    {
        return view('painel.permissions.create');
    }


    public function store(Request $request)
    {
        Permission::create($request->all());

        return redirect()->to('painel/permissions');
    }

    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);

        return view('painel.permissions.edit', compact('permissions'));
    }


    public function update($id, Request $request)
    {
        $permissions = Permission::findOrFail($id);

        $permissions->update($request->all());

        return redirect()->to('painel/permissions');
    }


    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();

        return redirect()->to('painel/permissions');
    }

    public function roles(Permission $permission,$id)
    {

        $permissions = $permission->find($id);

        $roles = $permissions->roles()->get();

        return view('painel.permissions.roles', compact('roles','permissions'));
    }




}
