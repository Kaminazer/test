<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data =  $request-> validated();
        $tags = $data['tags_id'];
        unset($data['tags_id']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('posts.show', $post->id);
    }
}
