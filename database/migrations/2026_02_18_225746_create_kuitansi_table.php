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
        Schema::create('kuitansi', function (Blueprint $table) {
            $table->integer('id_kuitansi')->primary();
            $table->string('id_faktur', 5)->nullable(); //* Foreign key ke tabel faktur
            $table->date('tgl_kuitansi')->nullable();
            $table->timestamps();

            //* Relasi dengan tabel faktur
            $table->foreign('id_faktur')
                ->references('id_faktur')
                ->on('faktur')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuitansi');
    }
};
