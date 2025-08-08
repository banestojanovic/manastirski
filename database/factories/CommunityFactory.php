<?php

namespace Database\Factories;

use App\Models\Community;
use App\Support\Disk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community>
 */
class CommunityFactory extends Factory
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
            'parish_id' => \App\Models\Diocese::factory(),
            'name' => fake()->unique()->name(),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->optional()->paragraph(),
            'other' => fake()->optional()->words(3, true),
        ];
    }

    public function image(): CommunityFactory
    {
        return $this->afterCreating(function (Community $community) {
            $img = rand(1, 3);

            $community->addMediaFromDisk("community/$img.jpg", 'demo')
                ->preservingOriginal()
                ->withProperties(['uuid' => Str::uuid()])
                ->setOrder(1)
                ->toMediaCollection(Disk::CommunityImage, Disk::CommunityImage);
        });
    }
}
