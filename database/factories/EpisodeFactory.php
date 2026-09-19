<?php

namespace Database\Factories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'episode_number' => fake()->unique()->numberBetween(1, 500),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'audio_url' => fake()->url(),
            'published_at' => fake()->date(),
            





        ];
    }
}
