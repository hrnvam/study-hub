<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tutors = User::whereHas('role', fn ($q) => $q->where('name', 'tutor'))->get();
        $categories = Category::all();
        $tags = Tag::all();

        Post::factory()
            ->count(30)
            ->recycle($tutors)        // автори: лише tutor-и
            ->recycle($categories)    // наявні категорії
            ->create()
            ->each(fn (Post $post) => $post->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')
            ));
    }
}
