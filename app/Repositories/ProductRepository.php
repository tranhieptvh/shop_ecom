<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class ProductRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Product::class;

    public function getFeaturedProducts() {
        return $this->getBuilder()->where(['is_feature' => 1])->limit(4)->get();
    }

    public function getNewProducts() {
        return $this->getBuilder()->orderBy('id', 'DESC')->limit(8)->get();
    }

    public function getProductsAdmin($paginate) {
        $products = $this->getBuilder();

        if (!empty($_GET['category_ids'])) {
            $products->whereIn('category_id', $_GET['category_ids']);
        }

        if (!empty($_GET['brand_id'])) {
            $products->orWhere('brand_id', $_GET['brand_id']);
        }

        if (!empty($_GET['name'])) {
            $products->orWhere('name', 'LIKE', '%' . $_GET['name'] . '%');
        }

        return $products->orderByDesc('id')->paginate($paginate);
    }

    public function getProductsClient($paginate) {
        $products = $this->getBuilder();

        if (!empty($_GET['category_ids'])) {
            $products->whereIn('category_id', $_GET['category_ids']);
        }

        if (!empty($_GET['price'])) {
            if ($_GET['price'] == 'duoi-1trieu') {
                $products->where('price', '<', \App\Product::SEARCH_PARAMS_PRICE[$_GET['price']]['value']);
            } else if ($_GET['price'] == 'tren-10trieu') {
                $products->where('price', '>', \App\Product::SEARCH_PARAMS_PRICE[$_GET['price']]['value']);
            } else {
                $products->whereBetween('price', \App\Product::SEARCH_PARAMS_PRICE[$_GET['price']]['value']);
            }
        }

        if (!empty($_GET['volume'])) {
            if ($_GET['volume'] == 'duoi-500') {
                $products->where('volume', '<', \App\Product::SEARCH_PARAMS_VOLUME[$_GET['volume']]['value']);
            } else if ($_GET['volume'] == 'tren-1000') {
                $products->where('volume', '>', \App\Product::SEARCH_PARAMS_VOLUME[$_GET['volume']]['value']);
            } else {
                $products->whereBetween('volume', \App\Product::SEARCH_PARAMS_VOLUME[$_GET['volume']]['value']);
            }
        }

        if (!empty($_GET['concentration'])) {
            if ($_GET['concentration'] == 'duoi-10') {
                $products->where('concentration', '<', \App\Product::SEARCH_PARAMS_CONCENTRATION[$_GET['concentration']]['value']);
            } else if ($_GET['volume'] == 'tren-50') {
                $products->where('concentration', '>', \App\Product::SEARCH_PARAMS_CONCENTRATION[$_GET['concentration']]['value']);
            } else {
                $products->whereBetween('concentration', \App\Product::SEARCH_PARAMS_CONCENTRATION[$_GET['concentration']]['value']);
            }
        }

        if (!empty($_GET['keyword'])) {
            $products->where('name', 'LIKE', '%' . $_GET['keyword'] . '%');
        }

        if (!empty($_GET['sort'])) {
            if ($_GET['sort'] == 'price-asc') {
                $products->orderBy('price', 'ASC');
            } else if ($_GET['sort'] == 'price-desc') {
                $products->orderBy('price', 'DESC');
            } else {
                $products->orderBy('id', 'DESC');
            }
        } else {
            $products->orderBy('id', 'DESC');
        }

        $result['count'] = $products->get()->count();
        $result['products'] = $products->paginate($paginate);

        return $result;
    }

    public function getProductBySlug($slug) {
        return $this->getBuilder()->where('slug', $slug)->first();
    }

    public function getCountProduct() {
        return $this->all()->count();
    }

    public function getBestSellProducts() {
        return $this->getBuilder()
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->selectRaw('products.*, SUM(order_details.quantity) AS quantity_sold')
            ->groupBy(['products.id'])
            ->orderByDesc('quantity_sold')
            ->take(5)
            ->get();
    }
}
