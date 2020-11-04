<?php
namespace App\Repositories\Eloquent;

use App\Product;
use App\Repositories\EloquentRepository;

class ProductRepository extends EloquentRepository
{
    public function getModel()
    {
        return  Product::class;
    }

    

}