<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable,HasRoles;
    // use HasPermissions;
    // use SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','address','phone', 'email', 'password',
    ];

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
    ];

    // 

    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function newss()
    {
        return $this->hasMany('App\News');
    }

    public function images()
    {
        return $this->morphMany('App\Image','imageable');
    }

    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role');
    // }
}
