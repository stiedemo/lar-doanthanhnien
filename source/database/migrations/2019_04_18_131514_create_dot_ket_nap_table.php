<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDotKetNapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dot_ket_nap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noidung');
            $table->integer('idnamhoc')->unsigned();
            $table->date('tgbatdau');
            $table->date('tgketthuc');
            $table->date('tghoc');
            $table->date('nketnap');
            $table->timestamps();
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
        Schema::dropIfExists('dot_ket_nap');
    }
}
