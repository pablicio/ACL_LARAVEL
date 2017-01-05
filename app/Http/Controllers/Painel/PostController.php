<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index(Post $post)
    {

        $posts = DB::table('posts')->paginate(5);

        $this->authorize('show',$post);

        return view('painel.posts.index', compact('posts', 'post'));

    }

}
