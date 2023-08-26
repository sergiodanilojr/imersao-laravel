<?php

namespace App\Repositories\Eloquent\Contracts;

interface CategoryEloquentRepositoryInterface extends EloquentRepositoryInterface
{
    public function findByName(string $name);
}
