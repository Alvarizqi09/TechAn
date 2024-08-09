<?php

namespace Modules\Shop\Repositories\Front;

use Modules\Shop\App\Models\Category;
use Modules\Shop\Repositories\Front\Interface\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface{
    public function findAll($options = array()){

        return Category::orderBy('name', 'asc')->get();
    }

    public function findbySlug($slug){
        return Category::where('slug', $slug)->firstOrfail();
    }
}