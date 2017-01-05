<?php

namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     public function index(User $user)
    {

        $users = DB::table('users')->paginate(10);

        $this->authorize('show',$user);

        return view('painel.users.index', compact('users'));
    }

      public function roles(User $user,$id)
    {

        $users = $user->find($id);

        $roles = $users->roles()->get();

        return view('painel.users.roles', compact('roles','users'));
    }

}
