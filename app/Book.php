<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
   protected $fillable = ['title', 'author', 'cover_image', 'file_name', 'group_id', 'year_of_publication'];

   protected $with = ['reviews'];

   protected $withCount = ['reviews'];

    public function getAuthorAttribute($value)
    {
        return Str::title($value);
    }

    public function getTitleAttribute($value)
    {
        return Str::title($value);
    }

    public function getCoverImageAttribute($value)
    {
        return asset('images/cover/'.$value);
    }

    public function getFileNameAttribute($value)
    {
        return public_path().'/books/'.$value;
    }
    //relationship
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function category()
    {
        return $this->hasOneThrough('App\Category', 'App\Group');
    }
}
