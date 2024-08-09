<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Shop\Repositories\Front\Interface\ProductRepositoryInterface;
use Modules\Shop\Repositories\Front\Interface\CategoryRepositoryInterface;


class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository,CategoryRepositoryInterface $categoryRepository)
    {
        parent::__construct();

        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;

        $this->data['categories'] = $this->categoryRepository->findAll();
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        $options = [
            'per_page' => $this->data['perpage']
        ];
        $this->data['products'] = $this->productRepository->findAll($options);
        return $this->loadTheme('products.index',$this->data);
    }
    public function category($categorySlug){
        $category = $this->categoryRepository->findbySlug($categorySlug);
        $options = [
            'per_page' => $this->data['perpage'],
        
            'filter' =>['category' => $categorySlug],
        ];

        $this->data['products'] = $this->productRepository->findAll($options);
        $this->data['category'] = $category;

        return $this->loadTheme('products.category',$this->data);
    }
}
