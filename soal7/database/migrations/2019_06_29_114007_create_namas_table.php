<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('namas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('id_hobi');
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();

            $table->foreign('id_hobi')->references('id')->on('hobis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('namas');
    }
}
