<?php

namespace Database\Factories;

use App\MediaType;
use App\Models\Diocese;
use App\Models\Listing;
use App\Support\Disk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diocese>
 */
class DioceseFactory extends Factory
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
            'description' => fake()->paragraph(),
        ];
    }

    public function image(): DioceseFactory
    {
        return $this->afterCreating(function (Diocese $diocese) {
            $img = rand(1, 3);

            $diocese->addMediaFromDisk("diocese/$img.jpg", 'demo')
                    ->preservingOriginal()
                    ->withProperties(['uuid' => Str::uuid()])
                    ->setOrder(1)
                    ->toMediaCollection(Disk::DioceseImage, Disk::DioceseImage);
        });
    }
}
