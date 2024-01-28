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
        Schema::create('probabilities', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->json('value')->nullable();
            $table->boolean('requires_odd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bets');
    }
};
