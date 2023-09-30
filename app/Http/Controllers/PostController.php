<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }
    public function store()
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
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }
    public function update(Post $post)
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
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
