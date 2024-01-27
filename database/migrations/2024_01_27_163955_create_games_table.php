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
        Schema::create('games', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->bigInteger('fixture_id');
            $table->string('probability');
            $table->double('probability_odd',8,2)->nullable();
            $table->foreignUuid('prediction_id')->constrained('predictions')->cascadeOnDelete();
            $table->boolean('result')->nullable();
            $table->json('match');
            $table->string('date');
            $table->string('kick_off');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');

    }
};
