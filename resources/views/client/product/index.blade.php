@extends('layouts.client.master')

@section('style')
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('/') }}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active">Sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="filter">
        <form action="">
            <div class="container">
                <div class="filter-wrap">
                    <div class="filter-item">
                        <p>Giá</p>
                        <label>
                            <select class="form-select" name="price">
                                <option value="">-- Tất cả --</option>
                                <option value="">0 - 500,000 VNĐ</option>
                                <option value="">500,000 - 1,000,000 VNĐ</option>
                                <option value="">1,000,000 - 2,000,000 VNĐ</option>
                                <option value="">Trên 2,000,000 VNĐ</option>
                            </select>
                        </label>
                    </div>
                    <div class="filter-item">
                        <p>Thể tích</p>
                        <label>
                            <select class="form-select" name="volume">
                                <option value="">-- Tất cả --</option>
                                <option value="">0 - 500 ml</option>
                                <option value="">500 - 1000 ml</option>
                                <option value="">Trên 1000 ml</option>
                            </select>
                        </label>
                    </div>
                    <div class="filter-item">
                        <p>Nồng độ</p>
                        <label>
                            <select class="form-select" name="concentration">
                                <option value="">-- Tất cả --</option>
                                <option value="">0 - 10 %</option>
                                <option value="">10 - 40 %</option>
                                <option value="">40 - 50 %</option>
                                <option value="">Trên 50 %</option>
                            </select>
                        </label>
                    </div>

                    <div class="filter-item">
                        <button type="submit" class="btn btn-submit">Lọc</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Danh sách sản phẩm</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        @foreach($products as $item)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('client.product.detail', $item->slug) }}">
                                                            <img class="default-img" src="{{ !empty($item->getMainImage->first()) ? asset($item->getMainImage->first()->path) : '' }}" alt="{{ $item->name }}">
                                                            <span class="stock">
                                                                @if(getDateDiffWithNow($item->created_at) < 7)
                                                                    <span class="new">New</span>
                                                                @endif
                                                            </span>
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action-2">
                                                                <a title="Add to cart" href="#">Thêm vào giỏ hàng <i class="ti-bag"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a href="{{ route('client.product.detail', $item->slug) }}">{{ $item->name }}</a></h3>
                                                        <p class="quality">{{ $item->volume && $item->concentration ? $item->volume . 'ml ' . $item->concentration . '%' : '' }}</p>
                                                        <div class="product-price">
                                                            {{--                                                            <span class="old">$60.00</span>--}}
                                                            <span>{{ number_format($item->price) }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
    <!-- End Product Area -->
@endsection

@section('script')
@endsection
