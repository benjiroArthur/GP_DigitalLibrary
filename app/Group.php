<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable= ['name','category_id'];

    protected $with = ['books'];

    protected $withCount = ['books'];
    //relationships

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
