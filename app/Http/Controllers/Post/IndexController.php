<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }
}
