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
        Schema::table('municipal_university_offers', function (Blueprint $table) {
            $table->integer('jornadas')->nullable();
            $table->integer('modalidad')->nullable();
            $table->float('precio_aproxim')->nullable();
            $table->string('link_universidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('municipal_university_offers', function (Blueprint $table) {
            $table->dropColumn('jornadas');
            $table->dropColumn('modalidad');
            $table->dropColumn('precio_aproxim');
            $table->dropColumn('link_universidad');
        });
    }
};
