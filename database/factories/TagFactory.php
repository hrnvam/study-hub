<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'grammar', 'vocabulary', 'speaking', 'writing', 'listening',
            'pronunciation', 'tenses', 'phrasal verbs', 'idioms', 'ielts',
            'fce', 'business english', 'b1', 'b2', 'c1',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
