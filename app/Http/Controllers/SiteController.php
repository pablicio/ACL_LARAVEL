<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Yaml\Tests\A;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('portal.home.home');
    }

    public function update($id)
    {

        $post = Post::find($id);

        return view('post-update', compact('post'));
    }

    public function rolesPermissions()
    {
        echo '<h1>'.auth()->user()->name.'</h1>';

        foreach (auth()->user()->roles as $role) {
            echo "<b>$role->name</b> -> ";

            $permissions = $role->permissions;
            foreach ($permissions as $permission) {

                echo "$permission->name , ";

            }

            echo '<hr>';
        }
    }
}
