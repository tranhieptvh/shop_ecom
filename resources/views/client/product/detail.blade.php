@extends('layouts.client.master')

@section('title')
    {{ $product->name }}
@endsection

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
                            <li><a href="{{ route('client.product.index') }}">Sản phẩm<i class="ti-arrow-right"></i></a></li>
                            <li class="active">{{ $product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="product-detail">
        <div class="container">
            <div class="row col-12">
                <div class="main-col col-9">
                    <div class="row">
                        <div class="col-4 left-col">
                            <div class="title">
                                <h1>{{ $product->name }}</h1>
                                <p class="quality mt-3 mb-3">{{ $product->volume && $product->concentration ? $product->volume . 'ml ' . $product->concentration . '%' : '' }}</p>
                                @foreach($categories as $item)
                                    <a href="{{ route('client.product.category', $item->slug) }}"> {{ $item->name }}</a>
                                @endforeach
                            </div>
                            <div class="description">
                                <div>Mô tả</div>
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>
                        <div class="col-8 mid-col">
                            <div class="main-img">
                                <div>
                                    <img src="{{ !empty($product->getMainImage->first()) ? asset($product->getMainImage->first()->path) : '' }}" alt="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="thumbnail-img owl-carousel">
                                @if (count($product->getThumbnailImage->toArray()) > 0)
                                    <div class="thumbnail-item active">
                                        <img src="{{ !empty($product->getMainImage->first()) ? asset($product->getMainImage->first()->path) : '' }}" alt="{{ $product->name }}">
                                    </div>
                                @endif
                                @foreach($product->getThumbnailImage->toArray() as $thumbnail)
                                    <div class="thumbnail-item">
                                        <img src="{{ asset($thumbnail['path']) }}" alt="thumbnail">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @if(!empty($product->content))
                        <div class="wrap-info">
                            <div class="wrap-title">
                                <h2 class="title">THÔNG TIN & ĐÁNH GIÁ</h2>
                            </div>
                                <div class="info">
                                    {!! $product->content !!}
                                </div>

                                <div class="show-more">
                                    <button class="btn-more">Xem tiếp...</button>
                                </div>
                        </div>
                    @endif
                </div>

                <div class="col-3 right-col">
                    <div class="right-info">
                        <div class="price-content">
                            <p class="price-web">Giá độc quyền trên Web</p>
                            <p class="price-number">{{ number_format($product->price) }} VNĐ</p>
                            <p class="price-vat">Giá trên chưa bao gồm VAT</p>
                        </div>
                        <div class="add-cart">
                            <button class="add-to-cart"
                                    data-product_id="{{ $product->id }}"
                                    data-user_id="{{ Auth::user() ? Auth::user()->id : '' }}"
                            >Thêm vào giỏ hàng &nbsp;<i class="ti-bag"></i></button>
                        </div>
                        <div class="continue-buy">
                            <a href="{{ url()->previous() }}">Tiếp tục mua hàng</a>
                        </div>
{{--                        <div class="wishlist">--}}
{{--                            <a href="">Sản phẩm yêu thích &nbsp;<i class="ti-heart"></i></a>--}}
{{--                        </div>--}}

                        <div class="status-box">
                            <p><i class="ti-check-box"></i> &nbsp; Còn hàng</p>
                            <p><i class="ti-check-box"></i> &nbsp; Sản phẩm có giao hàng nhanh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
