<?php

namespace Modules\Shop\Repositories\Front;

use Modules\Shop\App\Models\Product;
use Modules\Shop\Repositories\Front\Interface\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {
    public function findAll($options = array()){
        $perPage = $options['per_page'] ?? null;

        $products = Product::with(['categories','tags']);

        if ($perPage) {
            return $products->paginate($perPage);
        }

        return $products->get();
    }
}