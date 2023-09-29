<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post)
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
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('posts.show', $post->id);
    }
}
