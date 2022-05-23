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
}
