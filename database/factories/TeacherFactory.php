<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'full_name' => fake()->name(),
            'curriculum_vitae' => fake()->paragraphs($asText=true),
            'hourly_rate' => fake()->numberBetween(4500, 8000),
            'profile_pic_path' => fake()->imageUrl(),
            'profile_video_path' => fake()->url()
        ];
    }
}
