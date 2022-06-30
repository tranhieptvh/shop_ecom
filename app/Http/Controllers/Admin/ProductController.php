<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductImageRepository;
use App\Repositories\ProductRepository;
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
        $cond = [];
        $products = $this->productRepository->getAllProductsAdmin($cond, 10);
        $brands = $this->brandRepository->getBuilder()->get();
        $categories = $this->categoryRepository->getAllCategoriesAndRecursive();

        return view('admin.product.index')->with([
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function create() {
        $brands = $this->brandRepository->getBuilder()->get();
        $categories = $this->categoryRepository->getAllCategoriesAndRecursive();

        return view('admin.product.create')->with([
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function store(CreateProductRequest $request) {
        $product_data = $request->input();
        if (isset($product_data['is_feature'])) {
            $product_data['is_feature'] = 1;
        } else {
            $product_data['is_feature'] = 0;
        }

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

    public function edit($id) {
        $product = $this->productRepository->find($id);
        $brands = $this->brandRepository->getBuilder()->get();
        $categories = $this->categoryRepository->getAllCategoriesAndRecursive();

        return view('admin.product.edit')->with([
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product_data = $request->input();
        if (isset($product_data['is_feature'])) {
            $product_data['is_feature'] = 1;
        } else {
            $product_data['is_feature'] = 0;
        }

        DB::beginTransaction();
        try {
            $product = $this->productRepository->find($id);
            $result = $this->productRepository->update($product, $product_data);

            $main_img = $this->productImageRepository->findWhere(['product_id' => $id, 'type' => \App\ProductImage::MAIN])->first();
            if ($request->hasFile('main')) {
                $file = $request->main;
                $main_img_data = [];
                $main_img_data['path'] = handleImage($file, 'product');
                if (isset($main_img->path) && file_exists($main_img->path)) {
                    unlink($main_img->path);
                }
                if ($main_img) {
                    $this->productImageRepository->update($main_img, $main_img_data);
                } else {
                    $main_img_data['product_id'] = $product->id;
                    $this->productImageRepository->create($main_img_data);
                }
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
            if ($request->input('delete_thumbnail')) {
                $delete_ids = explode(',', $request->input('delete_thumbnail'));
                foreach ($delete_ids as $thumb_id) {
                    $thumb_img = $this->productImageRepository->find($thumb_id);
                    if (isset($thumb_img->path) && file_exists($thumb_img->path)) {
                        unlink($thumb_img->path);
                    }
                    $this->productImageRepository->delete($thumb_img);
                }
            }

            DB::commit();

            return back()->with('success', 'Cập nhật thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }

    public function destroy($id) {
        $product = $this->productRepository->find($id);
        $result = $this->productRepository->delete($product);

        return back()->with('success', 'Xóa thành công!');
    }

    public function upload_ckeditor(Request $request) {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $url = asset(handleImage($file, 'ckeditor'));

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
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
