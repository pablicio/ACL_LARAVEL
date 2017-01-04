<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {

        $posts = DB::table('posts')->paginate(5);

        $post = Post::find(1);

        $this->authorize('show',$post);

        return view('painel.posts.index', compact('posts'));

    }

}
