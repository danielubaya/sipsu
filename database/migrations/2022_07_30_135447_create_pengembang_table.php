<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama',200);
            $table->string('alamat',300);
            $table->string('telp',50);
            $table->string('pic_nama',100); 
            $table->string('pic_hp',50);
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
        Schema::dropIfExists('pengembangs');
    }
}
