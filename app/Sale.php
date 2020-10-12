<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'name','title','content','discount','start_day','end_day'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
