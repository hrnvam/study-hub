<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Grammar', 'Vocabulary', 'Speaking', 'Writing', 'Listening',
            'Reading', 'Exam Prep', 'Business English',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
