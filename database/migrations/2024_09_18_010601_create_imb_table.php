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
        Schema::create('imb', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_dp');
            $table->text('alamat');
            $table->text('lokasi');
            $table->string('box');
            $table->text('keterangan');
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
