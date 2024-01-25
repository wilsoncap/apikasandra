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
        Schema::create('municipal_university_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('univer_municip_id')->nullable();
            $table->unsignedBigInteger('ofert_academ_id')->nullable();
            $table->foreign('univer_municip_id')->references('id')->on('univerty_municipalities');
            $table->foreign('ofert_academ_id')->references('id')->on('academic_offers');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipal_university_offers');
    }
};
