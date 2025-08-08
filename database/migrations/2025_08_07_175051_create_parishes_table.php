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
        Schema::create('parishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diocese_id')->nullable()->constrained()->cascadeOnDelete();
            $table->json('name');
            $table->string('slug')->index()->unique();
            $table->json('description')->nullable();
            $table->json('other')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
};
