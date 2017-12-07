<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $directory = '/images/';
    
    protected $fillable = [ 'title', 'content', 'path'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
    
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }
}
