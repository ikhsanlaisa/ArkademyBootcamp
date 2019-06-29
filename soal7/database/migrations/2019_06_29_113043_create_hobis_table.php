<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHobisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
        });

        \App\hobi::insert([
            [
                'name'=>"Mobile Legend",
                'id_kategori'=>1
            ],
            [
                'name'=>"Futsal",
                'id_kategori'=>2
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobis');
    }
}
