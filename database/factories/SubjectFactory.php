<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'lecture_id' => User::factory(),
            'semester' => fake()->randomElement(['Ganjil', 'Genap']),
            'academic_year' => "2023/2024",
            'sks' => fake()->randomElement(['2', '4']),
            'code' => fake()->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'description' => fake()->paragraph(1)
        ];
    }
}
