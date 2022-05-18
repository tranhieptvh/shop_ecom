<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Category::class;

}
