<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $topics = [
            'Present Perfect vs Past Simple',
            'Phrasal verbs with "get"',
            'IELTS Writing Task 2 structure',
            'Zero, first and second conditionals',
            'Linking words for essays',
            'Useful phrases for business emails',
            'Reported speech',
            'Articles: a, an or the?',
            'Collocations with make and do',
            'Listening tips for the FCE exam',
            'Modal verbs of deduction',
            'Common false friends for Ukrainian speakers',
        ];

        $format = ['explained', 'practice exercises', 'common mistakes', 'quick quiz', 'cheat sheet'];

        return [
            'title' => fake()->randomElement($topics).': '.fake()->randomElement($format),
            'content' => fake()->realText(800),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
