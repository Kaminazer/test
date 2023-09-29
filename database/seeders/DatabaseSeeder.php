<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(50)->create();
        $tags = Tag::factory(30)->create();
        $posts = Post::factory(200)->create();

        $tagsId = $tags->random(3)->pluck('id')->toArray();
        foreach ($posts as $post) {
            $post->tags()->attach($tagsId);
        }
   }
}
