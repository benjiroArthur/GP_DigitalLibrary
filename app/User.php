<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'role_id',
    ];
    protected $with = ['role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_changed' => 'boolean',
        'profile_updated' => 'boolean',
        'date_of_birth'=> 'date',

    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function getImageAttribute($value)
    {
        return asset('images/users/'.$value);
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
