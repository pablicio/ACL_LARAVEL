<?php

namespace App\Http\Controllers\Portal;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Yaml\Tests\A;
use App\Http\Controllers\Controller;


class SiteController extends Controller
{
   
    public function index(Post $post)
    {
        return view('auth.login');
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
