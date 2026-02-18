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
        Schema::create('detil_pesan', function (Blueprint $table) {
            $table->integer('id_pesan'); //* Foreign key ke tabel pesan
            $table->string('id_produk', 5); //* Foreign key ke tabel produk
            $table->integer('jumlah');
            $table->decimal('harga',10, 0);
            $table->timestamps();

            //*1. Menentukan Primary Key gabungan (composite primary key)
            $table->primary(['id_pesan', 'id_produk']);

            //*2. Relasi dengan tabel pesan
            $table->foreign('id_pesan')
                ->references('id_pesan')
                ->on('pesan')
                ->onDelete('cascade');

            //* Relasi dengan tabel produk
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detil_pesan');
    }
};
