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
        Schema::create('book_markers', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->string('name');
            $table->text('logo')->nullable();
            $table->string('code')->nullable();
            $table->tinyText('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_markers');
    }
};