<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class InfoRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Info::class;

    public function getInfoShop() {
        return $this->getBuilder()->first();
    }
}
