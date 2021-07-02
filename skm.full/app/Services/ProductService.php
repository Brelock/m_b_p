<?php

namespace App\Services;

use App\Category;
use App\Product;

class ProductService
{
    public function getAll()
    {
        return Product::all();
    }

    public function getPopular()
    {
        return Product::where('popular', 1)->get();
    }

    public function getNewest()
    {
        return Product::where('new', 1)->get();
    }
    public function byCategoriesIds(array $ids)
    {
        return Product::whereIn('category_id',$ids)->get();
    }

    public function getByCateries(Category $category, Category $subcategory = null)
    {
        $childIds = [];
        if( $subcategory ){
            $childIds[] = $subcategory->id ;
        }
        else{
             $childIds = $category->childs()->select('id')->get()->toArray();
             $childIds[] = $category->id;
        }

        return $this->byCategoriesIds($childIds);
    }
}
