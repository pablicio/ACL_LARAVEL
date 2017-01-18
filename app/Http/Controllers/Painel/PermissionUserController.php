<?php

namespace App\Http\Controllers\Painel;
use App\User;
use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;

class PermissionUserController extends Controller
{

 	public function index(Permission $permission)
    {

        $permissions = $permission->all();

        return view('painel.permissions.index', compact('permissions'));
    }


    public function store(Request $request)
    {
        Permission::create($request->all());

        return redirect()->to('painel/permissions');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $allPermissions = Permission::all();

        $permissionsUser = [];

        $allPermissions = $allPermissions->groupBy(function($item, $key){
            $p = explode('-', $item->name);
            return $p[0];
        });

        $user->roles->each(function($role) use (&$permissionsUser) {
            $permissionsUser = array_merge($permissionsUser, $role->permissions->pluck('name')->toArray());
        });

        if($user->custom_permissions){
            $permissionsUser = array_merge($permissionsUser, collect($user->custom_permissions)->filter(function($p){
                return $p === true;
            })->keys()->toArray());
        }

        $permissionsUser = collect($permissionsUser);

        return view('painel.permission_users.create', compact('user', 'permissionsUser', 'allPermissions'));
    }


    public function update($id, Request $request)
    {
        $this->validate($request, [
            'permission' => 'required',
            'can' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->custom_permissions = array_merge($user->custom_permissions ?? [], [
            $request->input('permission') => $request->input('can') == 'true' ? true : false
        ]);


        $user->save();

        return [
            'status' => true,
            'message' => 'Alterado com sucesso'
        ];
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
