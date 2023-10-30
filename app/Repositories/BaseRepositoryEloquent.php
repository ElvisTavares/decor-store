<?php

namespace App\Repositories;

class BaseRepositoryEloquent implements BaseRepositoryContract
{
    protected $model;

    public function store($data)
    {
        return $this->model::create($data);
    }
}
