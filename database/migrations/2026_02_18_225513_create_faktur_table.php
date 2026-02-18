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
        Schema::create('faktur', function (Blueprint $table) {
            $table->integer('id_faktur')->primary();
            $table->string('id_pesan', 5)->nullable(); //* Foreign key ke tabel pesan
            $table->date('tgl_faktur')->nullable();
            $table->timestamps();

            //* Relasi dengan tabel pesan
            $table->foreign('id_pesan')
                ->references('id_pesan')
                ->on('pesan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur');
    }
};
