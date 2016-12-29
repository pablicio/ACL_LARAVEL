<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function index(){


        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalPermissions = Permission::count();
        $totalPosts = Post::count();

        return view('painel.home.index', compact('totalUsers','totalRoles','totalPermissions','totalPosts'));
    }
}
