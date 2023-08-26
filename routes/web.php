<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/hello-world', function () {
    $category = \App\Models\Category::with('posts')->find(2);
    dd($category);
});

Route::get('relationship', function () {
    //$post = \App\Models\Post::with(['postTags.tag'])->first();

    $post = \App\Models\Post::with(['tags'])->first();

    $tags = \App\Models\Tag::all("id");
    $ids = $tags->pluck('id')->all();

    // $post->tags()->attach($ids);

    // curl -X POST /posts/{id_post}/tags --data='{tags:[1,2,3]}'

    dd($post->load(['tags']));

});

Route::get('doubles', function (){
   $invoice = 15979.32;

   $installments = 13;

   $installment = preg_replace(
       "/[^0-9]/",
       "",
       ($invoice / $installments)
   );

   dd($invoice,$installment , ($installment * $installments));
});
