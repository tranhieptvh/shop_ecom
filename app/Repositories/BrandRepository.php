<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class BrandRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Brand::class;

    public function getCountBrand() {
        return $this->all()->count();
    }

}
