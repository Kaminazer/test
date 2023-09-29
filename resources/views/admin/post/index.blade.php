@extends('layouts.admin')
@section('content')
    <div>
        <div class="mt-3 ml-3">
            <a href="{{route('posts.create')}}" class=" bg-gray-800 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">{{__('Add new post')}}</a>
        </div>
        <div class="mt-3 ml-3">
            @foreach ($posts as $post)
                <div class="pb-1">
                    <a href="{{route('posts.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a>
                </div>
            @endforeach
        </div>
        <div class="mt-3 ml-3">
            {{$posts->links()}}
        </div>
    </div>
@endsection
