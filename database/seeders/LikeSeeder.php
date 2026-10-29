<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach (Post::all() as $post) {
            foreach ($users->random(rand(0, 6)) as $user) {
                $post->likes()->create(['user_id' => $user->id]);
            }
        }

        foreach (Comment::all() as $comment) {
            foreach ($users->random(rand(0, 2)) as $user) {
                $comment->likes()->create(['user_id' => $user->id]);
            }
        }
    }
}
