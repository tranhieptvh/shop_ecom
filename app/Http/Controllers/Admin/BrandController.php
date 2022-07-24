<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Repositories\BrandRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandRepository;

    public function __construct(
        BrandRepository $brandRepository
    ) {
        $this->brandRepository = $brandRepository;
    }


    public function index()
    {
        $brands = $this->brandRepository->getBuilder()->paginate(10);

        return view('admin.brand.index')->with('brands', $brands);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(CreateBrandRequest $request)
    {
        $brand = $request->input();

        $result = $this->brandRepository->create($brand);

        return back()->with('success', 'Thêm mới thành công!');
    }

    public function edit($id)
    {
        $brand = $this->brandRepository->find($id);

        return view('admin.brand.edit')->with('brand', $brand);
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        $brand_data = $request->input();

        $brand = $this->brandRepository->find($id);
        $result = $this->brandRepository->update($brand, $brand_data);

        return back()->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $brand = $this->brandRepository->find($id);
        $result = $this->brandRepository->delete($brand);

        return back()->with('success', 'Xóa thành công!');
    }
}
