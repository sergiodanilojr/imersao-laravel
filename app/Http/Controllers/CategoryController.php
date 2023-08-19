<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $categories = \App\Models\Category::with('posts')
//            ->paginate(
//                perPage: \request()->get('per_page'),
//                page: \request()->get('page')
//            );

        $categories = QueryBuilder::for(Category::class)
            ->allowedSorts(['created_at'])
            ->allowedIncludes(['posts'])
            ->paginate(
                perPage: \request()->get('per_page'),
                page: \request()->get('page')
            )->appends(\request()->query());

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
