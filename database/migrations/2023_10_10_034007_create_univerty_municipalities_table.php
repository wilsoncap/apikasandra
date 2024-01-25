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
        Schema::create('univerty_municipalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('universidad_id')->nullable();
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->foreign('universidad_id')->references('id')->on('universities');
            $table->foreign('municipio_id')->references('id')->on('municipalities');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('univerty_municipalities');
    }
};
