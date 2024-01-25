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
        Schema::table('univerty_municipalities', function (Blueprint $table) {
            $table->float('longitud')->nullable();
            $table->float('latitud')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('univerty_municipalities', function (Blueprint $table) {
            $table->dropColumn('longitud');
            $table->dropColumn('latitud');
            $table->dropColumn('telefono');
            $table->dropColumn('direccion');
        });
    }
};
