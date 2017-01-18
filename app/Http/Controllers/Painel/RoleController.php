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


    public function create()
    {
        return view('painel.roles.create');
    }


    public function store(Request $request)
    {
        Role::create($request->all());

        return redirect()->to('painel/roles');
    }

    public function edit($id)
    {
        $roles = Role::findOrFail($id);

        return view('painel.roles.edit', compact('roles'));
    }


    public function update($id, Request $request)
    {
        $roles = Role::findOrFail($id);

        $roles->update($request->all());

        return redirect()->to('painel/roles');
    }


    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->to('painel/roles');
    }
    public function permissions(Role $role,$id)
    {

        $roles = $role->find($id);

        $permissions = $roles->permissions()->get();

        return view('painel.roles.permissions', compact('roles','permissions'));
    }
}
