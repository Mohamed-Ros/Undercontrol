<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'image' => 'courses/sample-image.jpg',
            'price_usd' => $this->faker->randomFloat(2, 10, 500),
            'price_egp' => $this->faker->randomFloat(2, 100, 5000),
            'price_omr' => $this->faker->randomFloat(2, 5, 200),
            'description' => $this->faker->paragraph(),
            'detailed_description' => $this->faker->paragraphs(3, true),
        ];
    }
}
