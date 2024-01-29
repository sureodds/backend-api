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
            $table->uuid('id')->primary()->index();
            $table->bigInteger('fixture_id');
            $table->string('prediction_value')->nullable();
            $table->double('prediction_odd',8,2)->nullable();
            $table->foreignUuid('prediction_id')->constrained('predictions')->cascadeOnDelete();
            $table->foreignUuid('probability_id')->constrained('probabilities')->cascadeOnDelete();
            $table->boolean('result')->nullable();
            $table->json('match')->nullable();
            $table->string('date')->nullable();
            $table->string('kick_off')->nullable();
            $table->string('timezone')->nullable();
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
