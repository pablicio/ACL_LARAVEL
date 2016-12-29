<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Yaml\Tests\A;

class HomeController extends Controller
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
        $posts = $post->all();

        return view('home', compact('posts'));
    }

    public function update($id)
    {

        $post = Post::find($id);

        $this->authorize('update-post', $post);

        return view('post-update', compact('post'));
    }

    public function rolesPermissions()
    {
        echo '<h1>'.auth()->user()->name.'</h1>';

        foreach (auth()->user()->roles as $role) {
            echo $role->name;
        }
    }
}
