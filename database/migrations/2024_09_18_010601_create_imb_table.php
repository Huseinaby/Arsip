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
        Schema::create('imbs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_dp')->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->text('lokasi');
            $table->string('box');
            $table->text('keterangan')->nullable();
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imb');
    }
};
