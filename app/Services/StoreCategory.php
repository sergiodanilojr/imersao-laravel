<?php

namespace App\Services;

use App\Repositories\Eloquent\Contracts\CategoryEloquentRepositoryInterface;

final class StoreCategory
{
    public function __construct(
        private CategoryEloquentRepositoryInterface $repository
    )
    {
    }

    public function handle(array $data)
    {
        try {
            return $this->repository->insert($data);
        }catch (\Exception){
            return null;
        }
    }
}
