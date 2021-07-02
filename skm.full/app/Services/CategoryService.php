<?php

namespace App\Services;

use App\Category;

class CategoryService
{
    public function getAll()
    {
        return Category::all();
    }

    public function getParents()
    {
        return Category::active()->parents()->with('childs')->get();
    }

    public function getAllSubCategories()
    {
        return Category::whereNotNull('parent_id')->with('parent')->get();
    }
}
