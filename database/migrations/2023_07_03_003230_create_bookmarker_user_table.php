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
        Schema::create('book_marker_user', function (Blueprint $table) {
            $table->id();
            $table->uuid('book_marker_id');
            $table->foreign('book_marker_id')->references('id')->on('book_markers')->onDelete('cascade');

            // Add other columns for pivot table if necessary

            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_marker_user', function (Blueprint $table) {
            $table->dropForeign('book_marker_user_book_marker_id_foreign');
        });

        Schema::dropIfExists('book_marker_user');
    }
};
