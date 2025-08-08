<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\Diocese;
use App\Models\Parish;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::disk('public')->deleteDirectory('diocese');
        Storage::disk('public')->deleteDirectory('parish');
        Storage::disk('public')->deleteDirectory('community');

        User::factory()->admin()->create([
            'name' => 'Bane Stojanovic',
            'email' => 'admin@test.com',
        ]);

        Diocese::factory(4)->image()->create();

        Parish::factory(20)->image()->create([
            'diocese_id' => Diocese::inRandomOrder()->first()->id,
        ]);

        Community::factory(40)->image()->create([
            'user_id' => User::inRandomOrder()->first()->id,
            'parish_id' => Parish::inRandomOrder()->first()->id,
        ]);

        Video::factory(100)->create([
            'community_id' => Community::inRandomOrder()->first()->id,
        ]);
    }
}
