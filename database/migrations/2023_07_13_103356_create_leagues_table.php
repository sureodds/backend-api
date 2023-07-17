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

        Schema::create('leagues', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->string('name');
            $table->string('type');
            $table->tinyText('logo');
            $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete();
            $table->bigInteger('league_api_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leagues');
    }
};