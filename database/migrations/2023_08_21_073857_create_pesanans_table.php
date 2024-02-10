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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pembeli')->constrained('pembelis');
            $table->foreignId('id_barang')->constrained('barangs');
            $table->integer('qty');
            $table->date('tgl_pesan');
            $table->integer('metode');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->decimal('total_to_pay', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
