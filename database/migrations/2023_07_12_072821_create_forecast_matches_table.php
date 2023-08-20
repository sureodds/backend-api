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
        Schema::create('forecast_matches', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->bigInteger('fixture_id');
            $table->foreignUuid('book_marker_id')->constrained('book_markers')->cascadeOnDelete();
            $table->foreignUuid('bet_id')->constrained('')->cascadeOnDelete();
            $table->double('forecast_odd',8,2)->nullable();
            $table->string('prediction_value');
            $table->string('prediction_score')->nullable();
            $table->double('prediction_odd',8,2)->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('result')->nullable();
            $table->boolean('is_submitted');
            $table->string('code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forecast_matches');
    }
};