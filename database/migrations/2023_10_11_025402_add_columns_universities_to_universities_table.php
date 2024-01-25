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
        Schema::table('universities', function (Blueprint $table) {
            $table->string('url_logo')->nullable();
            $table->enum('tipo', ['privada', 'publica'])->nullable();
            $table->string('convenios')->nullable();
            $table->boolean('descuentos')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn('url_logo');
            $table->dropColumn('tipo');
            $table->dropColumn('convenios');
            $table->dropColumn('descuentos');
        });
    }
};
