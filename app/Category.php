<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Category extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.categories.list', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
