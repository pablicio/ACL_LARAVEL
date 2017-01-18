<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Permission;


use App\PermissionRole;
use App\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    public function index(Permission $permission)
    {

        $permissions = $permission->all();

        return view('painel.permission_roles.create');
    }


    public function create()
    {

        $roles = Role::pluck('label', 'id');

        $permissions = Permission::orderBy('name')->get();

        return view('painel.permission_roles.create', compact('roles', 'permissions'));
    }


    public function store(Request $request)
    {

        $role = Role::findOrFail($request['role_id']);

        $role->permissions()->sync($request['permissions']);

        return redirect()->to('painel/roles');
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

    public function roles(Permission $permission, $id)
    {

        $permissions = $permission->find($id);

        $roles = $permissions->roles()->get();

        return view('painel.permissions.roles', compact('roles', 'permissions'));
    }


}
