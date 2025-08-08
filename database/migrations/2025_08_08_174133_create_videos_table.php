<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->index()->unique();
            $table->foreignId('community_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('provider')->default(1);
            $table->string('url');
            $table->string('thumbnail_url')->nullable();
            $table->json('description')->nullable();
            $table->json('other')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
};
