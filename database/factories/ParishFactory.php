<?php

namespace Database\Factories;

use App\Models\Diocese;
use App\Models\Parish;
use App\Support\Disk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parish>
 */
class ParishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(3, true),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->optional()->paragraph(),
            'other' => fake()->optional()->words(3, true),
            'diocese_id' => null, // This should be set to a valid diocese ID later
        ];
    }

    /**
     * Indicate that the parish belongs to a diocese.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function image(): ParishFactory
    {
        return $this->afterCreating(function (Parish $parish) {
            $img = rand(1, 3);

            $parish->addMediaFromDisk("parish/$img.jpg", 'demo')
                ->preservingOriginal()
                ->withProperties(['uuid' => Str::uuid()])
                ->setOrder(1)
                ->toMediaCollection(Disk::ParishImage, Disk::ParishImage);
        });
    }
}
