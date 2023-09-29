<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store ($data ): void
    {
        $tags = $data['tags_id'];
        unset($data['tags_id']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update ($data, Post $post): void
    {
        $tags = $data['tags_id'];
        unset($data['tags_id']);
        $post->update($data);
        $post->tags()->sync($tags);
    }
}
