<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiachiHuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diachi_huyen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('huyen');
            $table->integer('idtinh')->unsigned();
            $table->foreign('idtinh')->references('id')->on('diachi_tinh');
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
        Schema::dropIfExists('diachi_huyen');
    }
}
