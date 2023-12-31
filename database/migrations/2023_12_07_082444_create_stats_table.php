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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('videos_id');
            $table->integer('hits')->default(0);
            $table->timestamps();

            // Foreign key from 'videos' table
            $table->foreign('videos_id')->references('id')->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
