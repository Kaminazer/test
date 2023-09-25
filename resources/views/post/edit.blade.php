@extends('layouts.main')
@section('content')
    <div class="py-6 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @method('Patch')
            @csrf
            <!-- Name -->
            <div class="bg-red">
                <x-input-label for="title" :value="__('Tittle')" />
                <x-text-input id="title" class="block mt-1 " type="text" name="title" value="{{$post->title}}" required autofocus autocomplete="title" />
            </div>
    
            <!-- Content -->
            <div class="mt-4">
                <x-input-label for="post_content" :value="__('Content')" />
                <x-text-input id="post_content" class="block mt-1 " type="text" name="post_content" value="{{$post->post_content}}" required autofocus autocomplete="post_content" />
            </div>
    
            <!-- Image -->
            <div class="mt-4">
                <div class="mt-4">
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 " type="text" name="image" value="{{$post->image}}" autofocus autocomplete="image" />
                </div>
            </div>
    
            <!-- Likes -->
            <div class="mt-4">
                <div class="mt-4">
                    <x-input-label for="likes" :value="__('Likes')" />
                    <x-text-input id="likes" class="block mt-1 " type="number" name="likes" value="{{$post->likes}}" required autofocus autocomplete="likes" />
                </div>
            </div> 

            <div class="mt-4">
                <x-input-label for="category" :value="__('Category')" />
                <select name="category_id" id="category" class="block mt-1">
                    @foreach ($categories as $category)
                    <option {{$category->id == $post->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option> 
                    @endforeach
                </select>
            </div>
            
            <div class="mt-4">
                <x-input-label for="tags" :value="__('Tags')" />
                <select name="tags_id[]" id="tags" multiple class="block mt-1">
                    @foreach ($tags as $tag)
                    <option 
                        @foreach ($post->tags as $postTag)
                            {{$tag->id == $postTag->id ? 'selected' : ''}}   
                        @endforeach  
                        value="{{$tag->id}}">{{$tag->title}}
                    </option>                  
                    @endforeach
                </select>
            </div>

            <div class="flex items-center mt-4">
                <x-primary-button class="ml-1">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection