<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    protected $videos = [
        'https://youtu.be/8JN0bU-marI?si=aRYga0sl4cZGBf1P',
        'https://youtu.be/pErBuS3uQNs?si=x263eBCbDQtTmQK2',
        'https://youtu.be/6ThdoxHSAOo?si=RZ4mv3fl10z0ncQE',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'community_id' => null,
            'provider' => 1,
            'url' => $this->videos[array_rand($this->videos)],
            'thumbnail_url' => $this->faker->imageUrl(),
            'description' => null,
            'other' => null,
        ];
    }
}
