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
        Schema::table('inventaris', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventaris', function (Blueprint $table) {
            //
            $table->dropColumn('location_id');
        });
    }
};
