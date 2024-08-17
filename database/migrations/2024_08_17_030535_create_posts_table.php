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
        Schema::create('posts', function (Blueprint $table) {
              // Crear un UUID como clave primaria
              $table->uuid('id')->primary();

              // Otros campos de la tabla
              $table->string('title');
              $table->text('content');
  
              // Campos de timestamps (created_at, updated_at)
              $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
