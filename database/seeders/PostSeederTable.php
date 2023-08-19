<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user){
            Category::all()->each(function (Category $category)use($user){
                Post::factory()->count(4)->create([
                    'user_id'=>$user->id,
                    'category_id'=>$category->id
                ]);
            });
        });


    }
}
