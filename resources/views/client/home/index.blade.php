@extends('layouts.client.master')

@section('style')
@endsection

@section('breadcrumbs')
@endsection

@section('content')
    <!-- Slider Area -->
    <section class="banner-wrap mt-4">
        <div class="container d-flex">
            <div class="left-col col-3 d-flex flex-column justify-content-between p-2">
                <a href="{{ route('client.product.category', 'scotch-whisky') }}">
                    <img src="{{ asset('client/images/banner/SCOTCH-WHISKY-1.jpg') }}" alt="SCOTCH-WHISKY">
                </a>
                <a href="{{ route('client.product.category', 'cognac') }}">
                    <img src="{{ asset('client/images/banner/COGNAC..jpg') }}" alt="COGNAC">
                </a>
            </div>
            <div class="mid-col col-6 p-2">
                <a href="">
                    <img src="{{ asset('client/images/banner/Malt_banner1.png') }}" alt="Malt">
                </a>
            </div>
            <div class="right-col col-3 d-flex flex-column justify-content-between p-2">
                <a href="route('client.product.category', 'japanese-whisky')">
                    <img src="{{ asset('client/images/banner/JAPANESE-WHISKY.-1.jpg') }}" alt="JAPANESE-WHISKY">
                </a>
                <a href="route('client.product.category', 'vang-champagne')">
                    <img src="{{ asset('client/images/banner/VANG-CHAMPAGNE-2.jpg') }}" alt="VANG-CHAMPAGNE">
                </a>
            </div>
        </div>
    </section>
    <!--/ End Slider Area -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach($featuredProducts as $item)
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('client.product.detail', $item->slug) }}">
                                        <img class="default-img"
                                             style="width: 550px"
                                             src="{{ !empty($item->getMainImage->first()) ? asset($item->getMainImage->first()->path) : '' }}" alt="{{ $item->name }}">
{{--                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                                            <div class="stock">
                                                <span class="out-of-stock">Hot</span>
                                                <span class="new">Best seller</span>
                                            </div>
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
{{--                                        <span class="old">$60.00</span>--}}
                                        <span>{{ number_format($item->price) }} VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

    <section class="midium-banner">
        <div class="container">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <a href="{{ route('client.product.detail', 'macallan-a-night-on-earth-in-scotland') }}">
                            <img src="{{ asset('client/images/banner/banner_1.jpg') }}" alt="banner">
                        </a>
{{--                        <div class="content">--}}
{{--                            <p>Man's Collectons</p>--}}
{{--                            <h3>Man's items <br>Up to<span> 50%</span></h3>--}}
{{--                            <a href="#">Shop Now</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <a href="{{ route('client.product.detail', 'macallan-harmony-collection-rich-cacao') }}">
                            <img src="{{ asset('client/images/banner/banner_2.jpg') }}" alt="banner">
                        </a>
{{--                        <div class="content">--}}
{{--                            <p>shoes women</p>--}}
{{--                            <h3>Macallan A Night On <br> Earth In Scotland</h3>--}}
{{--                            <a href="#" class="btn">Shop Now</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm mới</h2>
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
                                        @foreach($newProducts as $item)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('client.product.detail', $item->slug) }}">
                                                            <img class="default-img" src="{{ !empty($item->getMainImage->first()) ? asset($item->getMainImage->first()->path) : '' }}" alt="{{ $item->name }}">
                                                            <span class="stock">
                                                                @if(getDateDiffWithNow($item->updated_at) < 7)
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
                <a href="{{ route('client.product.index') }}" class="btn show-more">Xem thêm <i class="ti-angle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- End Product Area -->

@endsection

@section('script')
@endsection
