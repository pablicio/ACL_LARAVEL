<?php

namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Post $post)
    {

        $posts = $post->all();

        return view('painel.posts.index', compact('posts'));
    }

}
