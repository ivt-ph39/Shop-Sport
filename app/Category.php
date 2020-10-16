<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','parent_id'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function images()
    {
        return $this->morphMany('App\Image','imageable');
    }

    public function children()
    {
        return $this->hasMany('App\Category','parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category','parent_id');
    }
}
