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
        Schema::table('forecast_matches', function (Blueprint $table) {
            //
            $table->foreignUuid('bet_id')->constrained('bets')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forecast_matches', function (Blueprint $table) {
            //
            $table->dropForeign(['bet_id']);
            $table->dropColumn('bet_id');
        });
    }
};