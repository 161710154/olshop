<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_customs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('gambar');
            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_customs');
    }
}
