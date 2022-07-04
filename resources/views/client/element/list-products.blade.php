<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-list">
                    <h2>
                        <?php if ($type == 'index') echo 'Danh sách sản phẩm' ?>
                        <?php if ($type == 'category') echo $category->name ?>
                    </h2>
                    <span>(Tổng {{ $count }} sản phẩm)</span>

                    <div class="wrap-sort">
                        <select name="" id="select-sort" class="form-select">
                            <option value="">Sắp xếp</option>
                            <option value="price-asc" {{ (!empty($_GET['sort']) && $_GET['sort'] == 'price-asc') ? 'selected' : '' }}>Giá tăng dần</option>
                            <option value="price-desc" {{ (!empty($_GET['sort']) && $_GET['sort'] == 'price-desc') ? 'selected' : '' }}>Giá giảm dần</option>
                        </select>
                    </div>
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
                                    @if($products->count() == 0)
                                        <p class="mt-4">Không tìm thấy sản phẩm nào</p>
                                    @endif
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
                                                        <div class="product-action-2 add-to-cart"
                                                             data-product_id="{{ $item->id }}"
                                                             data-user_id="{{ Auth::user() ? Auth::user()->id : '' }}">
                                                            <a title="Add to cart" href="javascript:void(0)">Thêm vào giỏ hàng <i class="ti-bag"></i></a>
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
            {!! $products->withQueryString()->links() !!}
        </div>
    </div>
</div>
