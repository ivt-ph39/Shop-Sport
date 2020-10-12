<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','price','quantity','sale_id','category_id','brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function feedbacks()
    {
        return $this->belongsTo('App\Feedback');
    }

    public function images()
    {
        return $this->morphMany('App\Image','imageable');
    }
}
