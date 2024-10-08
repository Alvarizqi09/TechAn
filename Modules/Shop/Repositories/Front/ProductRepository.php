<?php

namespace Modules\Shop\Repositories\Front;

use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Product;
use Modules\Shop\Repositories\Front\Interface\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {
    public function findAll($options = array()){
        $perPage = $options['per_page'] ?? null;
        $categorySlug = $options['filter']['category'] ?? null;

        $products = Product::with(['categories','tags']);

        if($categorySlug){
            $category = Category::where('slug',$categorySlug)->firstOrfail();

            $childCategoryIDs = Category::childIDs($category);

            $categoryIDs = array_merge([$category->id],$childCategoryIDs);

            $products->whereHas('categories',function($query) use ($categoryIDs){
                $query->whereIn('shop_categories.id',$categoryIDs);
            });
        }

        if ($perPage) {
            return $products->paginate($perPage);
        }

        return $products->get();
    }
}