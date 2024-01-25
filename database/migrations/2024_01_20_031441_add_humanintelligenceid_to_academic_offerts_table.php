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
        Schema::table('academic_offers', function (Blueprint $table) {
            $table->unsignedBigInteger('human_intelligence_id')->nullable()->after('categoria_estudio_id');
            $table->foreign('human_intelligence_id')->references('id')->on('human_intelligences');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_offers', function (Blueprint $table) {
            $table->dropColumn('human_intelligence_id');
        });
    }
};
