<?php

use App\User;
use App\Phone;
use App\Post;
use App\Comment;
use App\Role;
use App\Country;
use App\Video;
use App\Tag;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}/phone', function($id){
    return User::findOrFail($id)->phone->number;
});

Route::get('/phone/{id}/user', function($id){
    return Phone::findOrFail($id)->user->name;    
});

Route::get('/user/{id}/posts', function($id){
    $user = User::findOrFail($id);
    foreach($user->posts as $post){
        echo $post->title . "<br>";
    }
});

Route::get('/post/{id}/user', function($id){
    return Post::findOrFail($id)->user->name;    
});

Route::get('/user/{id}/roles', function($id){
    $user = User::findOrFail($id);
    foreach($user->roles as $role){
        echo $role->name . "<br>";
    }
});

Route::get('/role/{id}/users', function($id){
    $role = Role::findOrFail($id);
    foreach($role->users as $user){
        echo $user->name . "<br>";
    }
});

Route::get('/country/{id}/posts', function($id){
    $country = Country::findOrFail($id);
    foreach($country->posts as $post){
        echo $post->title . "<br>";
    }
});

Route::get('/post/{id}/comments', function($id){
    $post = Post::findOrFail($id);
    foreach($post->comments as $comment){
        echo $comment->body . '<br>';
    }
});

Route::get('/video/{id}/comments', function($id){
    $video = Video::findOrFail($id);
    foreach($video->comments as $comment){
        echo $comment->body . '<br>';
    }
});

Route::get('/video/{id}/tags', function($id){
    $video = Video::FindOrFail($id);
    foreach($video->tags as $tag){
        echo $tag->name . '<br>';        
    }
});

Route::get('/post/{id}/tags', function($id){
    $post = Post::FindOrFail($id);
    foreach($post->tags as $tag){
        echo $tag->name . '<br>';        
    }
});

Route::get('/tag/{id}/videos', function($id){
        $tag =  Tag::findOrFail($id);
        foreach($tag->videos as $video){
            echo $video->title . '<br>';
        }
});

Route::get('/tag/{id}/posts', function($id){
        $tag =  Tag::findOrFail($id);
        foreach($tag->posts as $post){
            echo $post->title . '<br>';
        }
});

Route::get('collection', function(){
    $user = User::findOrFail(1);
    foreach($user->posts()->where('active', 1) as $post){
        echo $post->title . '<br>';
    }
});

//Crud Application

Route::group(['middleware'=>'web'], function(){
    Route::resource('/posts', 'PostsController');
});
