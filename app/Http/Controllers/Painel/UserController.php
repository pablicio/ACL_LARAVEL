<?php

namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use RegistersUsers;

    public function index(User $user)
    {

        $users = DB::table('users')->paginate(10);

        $this->authorize('show',$user);

        return view('painel.users.index', compact('users'));
    }

    public function create()
    {
        return view('painel.users.create');
    }


    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);


        return redirect()->to('painel/users');
    }


    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        $userRoles = $users->roles->pluck('id');

        return view('painel.users.edit', compact('users', 'roles', 'userRoles'));
    }


    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'roles' => 'required',
            'password' => 'confirmed'
        ]);

        $data = $request->all();

        if(!empty($request['password'])){
            if($id == auth()->user()->id){
                if (!Hash::check($request->senha_atual, Auth::user()->password))
                {
                    \Session::flash('mensagem', 'Senha Atual Incorreta!!');

                    return redirect('/painel/users/'. Auth::user()->id.'/edit');
                }
            }

            $data['password'] = bcrypt($request['password']);
        }

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        $user->roles()->sync($request->input('roles', []));

        return redirect()->to('painel/users');
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->to('painel/users');
    }
    public function roles(User $user,$id)
    {

        $users = $user->find($id);

        $roles = $users->roles()->get();

        return view('painel.users.roles', compact('roles','users'));
    }


}
