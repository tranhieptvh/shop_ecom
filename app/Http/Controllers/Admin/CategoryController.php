<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
//        $categories = $this->categoryRepository->getBuilder()->paginate(5);
        $categories = $this->categoryRepository->getAllCategoriesAndRecursive();

        return view('admin.category.index')->with('categories', $categories);
    }

    public function create() {
        $categories = $this->categoryRepository->getAllCategoriesAndRecursive();

        return view('admin.category.create')->with('categories', $categories);
    }

    public function store(CreateCategoryRequest $request) {
        $category_data = $request->input();

        $this->categoryRepository->create($category_data);

        return back()->with('success', 'Thêm mới thành công!');
    }

    public function edit($id) {
        $category = $this->categoryRepository->find($id);
        $categories = $this->categoryRepository->getAllCategoriesAndRecursive();

        return view('admin.category.edit')->with([
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function update(UpdateCategoryRequest $request, $id) {
        $category_data = $request->input();

        $category = $this->categoryRepository->find($id);
        $result = $this->categoryRepository->update($category, $category_data);

        return back()->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);
        $result = $this->categoryRepository->delete($category);

        return back()->with('success', 'Xóa thành công!');
    }
}
