@extends('layouts.app')
@section('content')
    <h1>Post: {{$post->title}} - <a href="{{route('posts.edit', $post->id)}}">edit</a></h1>
    <p>{{$post->content}}</p>
    
@endsection