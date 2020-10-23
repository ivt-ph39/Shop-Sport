<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $searchable = [
        'email',
        'name'
    ];

    protected $fillable = [
        'name', 'description', 'price', 'quantity', 'sale_id', 'category_id', 'brand_id'
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
        return $this->morphMany('App\Image', 'imageable');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach ($words as $key => $word) {
            /*
             * applying + operator (required word) only big words
             * because smaller ones are not indexed by mysql
             */
            if (strlen($word) >= 1) {
                $words[$key] = '+' . $word  . '*';
            }
        }

        $searchTerm = implode(' ', $words);

        return $searchTerm;
    }

    public function scopeFullTextSearch($query, $columns, $term)
    {
        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($term));

        return $query;
    }
}
