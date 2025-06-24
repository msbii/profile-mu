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
        Schema::create('sk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_sk_id'); // Foreign Key
            $table->string('title'); // Judul SK
            $table->string('slug')->unique();
            $table->year('tahun')->nullable();
            $table->text('content'); // Isi SK
            $table->string('dokumen');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Relasi ke tabel kategori_sk
            // $table->foreign('kategori_sk_id')->references('id')->on('kategori_sk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk');
    }
};
