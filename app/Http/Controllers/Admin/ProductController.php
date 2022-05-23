<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(
        ProductRepository $productRepository,
        BrandRepository $brandRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $products = $this->productRepository->getBuilder()->paginate(10);

        return view('admin.product.index')->with('products', $products);
    }

    public function create() {
        $brands = $this->brandRepository->getBuilder()->get();
        $categories = recursive($this->categoryRepository->getBuilder()->orderBy('ordering')->get());

        return view('admin.product.create')->with([
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function store(CreateProductRequest $request) {
        $product_data = $request->input();

        $this->productRepository->create($product_data);

        return back()->with('success', 'Thêm mới thành công!');
    }
}
