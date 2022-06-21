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
        return $this->getBuilder()->where(['is_feature' => 1])->orderBy('updated_at', 'DESC')->limit(4)->get();
    }

    public function getNewProducts() {
        return $this->getBuilder()->orderBy('id', 'DESC')->limit(8)->get();
    }
}
