<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class ImageRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Image::class;
}
