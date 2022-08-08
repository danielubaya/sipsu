<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembangidFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::table('perumahans', function (Blueprint $table) {
            $table->unsignedBigInteger('pengembang_id');
         
            $table->foreign('pengembang_id')->references('id')->on('pengembangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perumahans', function (Blueprint $table) {
            $table->dropForeign('pengembang_id');
            $table->drop('pengembang_id');
        });
    }
}
