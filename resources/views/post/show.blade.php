@extends('layouts.main')
@section('content')
<div class="mt-3 ml-3">
    {{$post->id}}. {{$post->title}}
</div>
<div class="mt-3 ml-3">
    {{_('Category: ')}} {{$post->category->title}}
</div>
<div class="mt-3 ml-3">
    {{_('Tags: ')}}
    @foreach ($post->tags as $tag)
        {{$tag->title}}
    @endforeach
</div>

<div class="mt-3 ml-3">
    <a href="{{route('posts.edit', $post->id)}}">{{__('Edit')}}</a> 
</div>
<div class="mt-3 ml-3">
    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
        @method('delete')
        @csrf
        <div class="flex items-center mt-4">
            <x-primary-button class="ml-1">
                {{ __('Delete') }}
            </x-primary-button>
        </div>
    </form>
</div>
<div class="mt-3 ml-3">
    <a href="{{route('posts.index')}}">{{__('Back')}}</a> 
</div>
@endsection