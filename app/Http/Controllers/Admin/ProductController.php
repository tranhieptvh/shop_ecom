<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductImageRepository;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(
        ProductRepository $productRepository,
        ProductImageRepository $productImageRepository,
        BrandRepository $brandRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->productImageRepository = $productImageRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $products = $this->productRepository->getBuilder()->orderByDesc('id')->paginate(10);

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

        DB::beginTransaction();
        try {
            $product = $this->productRepository->create($product_data);
            if ($request->hasFile('main')) {
                $file = $request->main;

                $main_img_data = [];
                $main_img_data['path'] = handleImage($file, 'product');
                $main_img_data['product_id'] = $product->id;
                $this->productImageRepository->create($main_img_data);
            }
            if ($request->hasFile('thumbnail')) {
                foreach($request->thumbnail as $file) {
                    $thumbnail_data = [];
                    $thumbnail_data['path'] = handleImage($file, 'product');
                    $thumbnail_data['type'] = \App\ProductImage::THUMBNAIL;
                    $thumbnail_data['product_id'] = $product->id;
                    $this->productImageRepository->create($thumbnail_data);
                }
            }

            DB::commit();

            return back()->with('success', 'Lưu thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }

    public function upload_ckeditor(Request $request) {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathInfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move('uploads/images/ckeditor/', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $url = asset('uploads/images/ckeditor/' . $fileName);
            $msg = 'Tải ảnh thành công';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-Type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function file_browser() {
        $paths = glob(public_path('uploads/images/ckeditor/*'));
        $fileNames = [];
        foreach ($paths as $path) {
            $fileNames[] = basename($path);
        }
        $data = [
            'fileNames' => $fileNames,
        ];
        return view('admin.ckeditor.images')->with($data);
    }
}
