@extends('layouts.app')
@section('content')
    <H1>Create Post</H1>
    {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::file('file', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection

@if(count($errors) > 0)
    {{dd($errors)}}
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif