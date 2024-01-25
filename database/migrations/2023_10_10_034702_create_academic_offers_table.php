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
        Schema::create('academic_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_oferta');
            $table->unsignedBigInteger('categoria_estudio_id')->nullable();
            $table->foreign('categoria_estudio_id')->references('id')->on('study_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_offers');
    }
};
