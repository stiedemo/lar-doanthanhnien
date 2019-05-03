<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocSinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_sinh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hodem');
            $table->string('hovaten');
            $table->string('ten');
            $table->string('gioitinh');
            $table->date('ngaysinh');
            $table->string('diachi')->nullable();
            $table->integer('iddiachixa')->unsigned();
            $table->integer('iddiachihuyen')->unsigned()->nullable();
            $table->integer('iddiachitinh')->unsigned()->nullable();
            $table->integer('idchidoan')->unsigned()->nullable();
            $table->integer('isdoanvien')->nullable();
            $table->date('ngayvaodoan')->nullable();
            $table->integer('iddotketnap')->unsigned();
            $table->string('chucvu')->nullable();
            $table->string('tenbo')->nullable();
            $table->string('tenme')->nullable();
            $table->string('dantoc')->nullable();
            $table->string('tongiao')->nullable();
            $table->string('dienchinhsach')->nullable();
            $table->foreign('iddiachitinh')->references('id')->on('diachi_tinh');
            $table->foreign('iddiachihuyen')->references('id')->on('diachi_huyen');
            $table->foreign('iddiachixa')->references('id')->on('diachi_xa');
            $table->foreign('idchidoan')->references('id')->on('chi_doan');
            $table->foreign('iddotketnap')->references('id')->on('dot_ket_nap');
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
        Schema::dropIfExists('hoc_sinh');
    }
}
