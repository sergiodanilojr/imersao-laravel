<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Eloquent\Contracts\CategoryEloquentRepositoryInterface;
use App\Services\StoreCategory;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    public function __construct(
        private StoreCategory $service,
        private CategoryEloquentRepositoryInterface $repository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->repository->paginate(
            page: request()->get('page'),
            perPage: request()->get('per_page')
        );

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $category = $this->service->handle($request->validated());

        return (new CategoryResource($category))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = QueryBuilder::for(Category::class)
            ->allowedSorts(['created_at'])
            ->allowedIncludes(['posts'])
            ->findOr($id, fn() => throw new NotFoundException("Categoria não encontrada!"));

        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::findOr(
            $id,
            fn() => throw new NotFoundException("Categoria não encontrada!")
        );

        $category->update($request->validated());

        $category->refresh();

        return (new CategoryResource($category));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
