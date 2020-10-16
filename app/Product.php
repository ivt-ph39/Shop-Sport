<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Product extends Model implements Searchable
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
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.products.detail', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
