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
        Schema::create('academicoffers_humanintelligences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_offer_id')->nullable();
            $table->unsignedBigInteger('human_intelligence_id')->nullable();
            $table->foreign('academic_offer_id')->references('id')->on('academic_offers');
            $table->foreign('human_intelligence_id')->references('id')->on('human_intelligences');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academicoffers_humanintelligences');
    }
};
