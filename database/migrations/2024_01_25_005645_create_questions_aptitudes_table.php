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
        Schema::create('questions_aptitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actitude_test_id')->nullable();
            $table->unsignedBigInteger('question_id')->nullable();
            $table->foreign('actitude_test_id')->references('id')->on('actitude_tests');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions_aptitudes');
    }
};
