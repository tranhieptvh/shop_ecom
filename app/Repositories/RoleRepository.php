<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class RoleRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Role::class;

    public function getRolesByRole($role) {
        if ($role == \App\Role::ROLE['ROOT']) {
            return $this->all();
        } else {
            $this->newQuery();
            return $this->query->where('id', '<>', \App\Role::ROLE['ROOT'])->get();
        }
    }
}
