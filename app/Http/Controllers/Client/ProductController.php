<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function category($slug) {
        $category = $this->categoryRepository->getCategoryBySlug($slug);
        if (!$category) {
            return view('errors.404');
        }
        $category_ids = $this->categoryRepository->getChildCategories($category);
        $_GET['category_ids'] = $category_ids;
        $result = $this->productRepository->getProductsClient(12);
        $products = $result['products'];
        $count = $result['count'];

        return view('client.product.category')->with([
            'products' => $products,
            'count' => $count,
            'category' => $category,
        ]);
    }

    public function index() {
        $result = $this->productRepository->getProductsClient(12);
        $products = $result['products'];
        $count = $result['count'];

        return view('client.product.index')->with([
            'products' => $products,
            'count' => $count,
        ]);
    }

    public function detail($slug) {
        $product = $this->productRepository->getProductBySlug($slug);
        $categories = $this->categoryRepository->getParentCategory($product->category_id);

        return view('client.product.detail')->with([
            'product' => $product,
            'categories' => $categories,
        ]);
    }
}
