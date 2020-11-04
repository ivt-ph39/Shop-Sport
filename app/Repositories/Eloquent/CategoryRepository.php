<?php
namespace App\Repositories\Eloquent;

use App\Category;
use App\Repositories\EloquentRepository;

class CategoryRepository extends EloquentRepository
{
    public function getModel()
    {
        return  Category::class;
    }

    public function xoa($id)
    {
        // DB::enableQueryLog();
        $category = $this->find($id);
        // return $category->parent_id;
        if (!$category->parent_id) {
            $children =  $this->find($id)->load('children')->children;
            // dd(DB::getQueryLog());
            foreach ($children as $child) {
                $categoryId =  $this->find($child->id);
                $categoryId->delete();
            }
        }
        $category->delete();
    }

}