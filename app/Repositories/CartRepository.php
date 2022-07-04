<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class CartRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Cart::class;

}
