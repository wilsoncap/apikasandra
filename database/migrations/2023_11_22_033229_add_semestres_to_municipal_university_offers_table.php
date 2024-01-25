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
            $table->string('semestres')->nullable()->after('ofert_academ_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('municipal_university_offers', function (Blueprint $table) {
            $table->dropColumn('semestres');
        });
    }
};
