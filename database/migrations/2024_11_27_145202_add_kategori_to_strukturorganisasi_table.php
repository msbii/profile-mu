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
        Schema::table('strukturorganisasi', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('kategori_id'); // Foreign Key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stukturorganisasi', function (Blueprint $table) {
            //
            $table->dropColumn('kategori_id');
        });
    }
};
