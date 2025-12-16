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
        Schema::create('resep_makanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resep');
            $table->foreignId('id_kategori_makanan')->constrained('kategori_makanan')->cascadeOnDelete();
            $table->foreignId('id_bahan')->constrained('bahan_makanan')->cascadeOnDelete();
            $table->text('deskripsi');
            $table->timestamps();
            $table->string('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_makanan');
    }
};
