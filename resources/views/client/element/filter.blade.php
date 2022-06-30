<div class="filter">
    <form action="" id="search-product">
        <div class="container">
            <div class="filter-wrap">
                <input type="text" name="keyword" hidden value="{{ !empty($_GET['keyword']) ? $_GET['keyword'] : ''}}">
                <div class="filter-item">
                    <p>Khoảng giá</p>
                    <label>
                        <select class="form-select" name="price">
                            <option value="">-- Tất cả --</option>
                            @foreach(\App\Product::SEARCH_PARAMS_PRICE as $key => $item)
                                <option value="{{ $key }}" {{ (!empty($_GET['price']) && $key == $_GET['price']) ? 'selected' : ''}}>{{ $item['title'] }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="filter-item">
                    <p>Thể tích</p>
                    <label>
                        <select class="form-select" name="volume">
                            <option value="">-- Tất cả --</option>
                            @foreach(\App\Product::SEARCH_PARAMS_VOLUME as $key => $item)
                                <option value="{{ $key }}" {{ (!empty($_GET['volume']) && $key == $_GET['volume']) ? 'selected' : ''}}>{{ $item['title'] }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="filter-item">
                    <p>Nồng độ</p>
                    <label>
                        <select class="form-select" name="concentration">
                            <option value="">-- Tất cả --</option>
                            @foreach(\App\Product::SEARCH_PARAMS_CONCENTRATION as $key => $item)
                                <option value="{{ $key }}" {{ (!empty($_GET['concentration']) && $key == $_GET['concentration']) ? 'selected' : ''}}>{{ $item['title'] }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <input type="text" name="sort" hidden value="{{ !empty($_GET['sort']) ? $_GET['sort'] : ''}}">

                <div class="filter-item">
                    <button type="submit" class="btn btn-submit">Lọc</button>
                </div>
            </div>
        </div>
    </form>
</div>
