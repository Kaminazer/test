<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data =  request()-> validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string|nullable',
            'likes' => 'numeric',
            'category_id' => 'numeric',
            'tags_id' => 'array',
        ]);
        $tags = $data['tags_id'];
        unset($data['tags_id']);
        $post = Post::FirstOrCreate($data);
        $post->tags()->attach($tags);
        return redirect()->route('posts.index');
    }
}
