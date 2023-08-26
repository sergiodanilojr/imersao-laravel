<?php

namespace App\Repositories\Eloquent\Contracts;

interface EloquentRepositoryInterface
{
    public function paginate($page, $perPage);

    public function insert(array $data);

    public function update($key, array$data);

    public function findBy($colunm, $value);

    public function findById($id);
}
