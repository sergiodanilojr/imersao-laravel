<?php

namespace App\Repositories\Eloquent\Concretes;

use App\Models\Category;
use App\Repositories\Eloquent\Contracts\CategoryEloquentRepositoryInterface;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryEloquentRepository implements CategoryEloquentRepositoryInterface
{
    public function findByName(string $name)
    {
        // TODO: Implement findByName() method.
    }

    public function paginate($page, $perPage)
    {
        return QueryBuilder::for(Category::class)
            ->allowedSorts(['created_at'])
            ->allowedIncludes(['posts'])
            ->paginate(
                perPage: $perPage,
                page: $page
            )->appends(\request()->query());
    }

    public function insert(array $data)
    {
        return Category::create($data);
    }

    public function update($key, array $data)
    {
        // TODO: Implement update() method.
    }

    public function findBy($colunm, $value)
    {
        // TODO: Implement findBy() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}
