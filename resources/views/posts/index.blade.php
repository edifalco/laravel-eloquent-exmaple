@extends('layouts.app')
@section('content')
    <h1>Posts Index - <a href="/posts/create">Create</a> </h1>
    <ul>
        @foreach($posts as $post)
        <div class="image-container">
            <img src="{{ $post->path }}" width="100px">
        </div>
            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
@endsection