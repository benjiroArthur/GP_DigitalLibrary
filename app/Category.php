<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'cover_image'];

    protected $with = ['groups', 'books'];

    protected $withCount = ['books','groups'];

    //relationships
    public function books()
    {
        return $this->hasManyThrough('App\Book', 'App\Group');
    }

    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function getCoverImageAttribute($value)
    {
        return asset('images/cover/'.$value);
    }

}
