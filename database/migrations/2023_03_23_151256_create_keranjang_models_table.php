<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang_models', function (Blueprint $table) {
            $table->id("ID_Keranjang");
            $table->integer("jumlah_produk");
            $table->integer("total_harga");
            $table->unsignedBigInteger("ID_produk");
            $table->foreign('ID_produk')->references('ID_produk')->on('product_models')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang_models');
    }
};
