<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListViPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_vi_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idhocsinh')->unsigned();
            $table->integer('idmaloi')->unsigned();
            $table->integer('idusers')->unsigned();
            $table->integer('idnamhoc')->unsigned();
            $table->string('ghichu', 500)->nullable();
            $table->foreign('idhocsinh')->references('id')->on('hoc_sinh');
            $table->foreign('idmaloi')->references('id')->on('ma_loi_vi_pham');
            $table->foreign('idusers')->references('id')->on('users');
            $table->foreign('idnamhoc')->references('id')->on('nam_hoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_vi_pham');
    }
}
