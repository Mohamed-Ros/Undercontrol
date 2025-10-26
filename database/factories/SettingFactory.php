<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Setting;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraph(),
            'facebook' => $this->faker->url(),
            'linkedin' => $this->faker->url(),
            'tiktok' => $this->faker->url(),
            'logo' => 'logos/sample-logo.png',
            'copyright' => $this->faker->sentence(),
        ];
    }
}
