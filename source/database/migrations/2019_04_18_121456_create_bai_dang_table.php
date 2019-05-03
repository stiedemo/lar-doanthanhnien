<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaiDangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_dang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idloaitin')->unsigned();
            $table->string('tieude', 100);
            $table->string('tieudekhongdau', 100);
            $table->string('anhdaidien')->nullable();
            $table->integer('idnguoidang')->unsigned();
            $table->integer('idnamhoc')->unsigned();
            $table->string('mota')->nullable();
            $table->string('tukhoa')->nullable();
            $table->string('nguon')->nullable();
            $table->integer('kiemduyet');
            $table->string('noidung', 5000);
            $table->foreign('idloaitin')->references('id')->on('loai_tin');
            $table->foreign('idnamhoc')->references('id')->on('nam_hoc');
            $table->foreign('idnguoidang')->references('id')->on('users');
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
        Schema::dropIfExists('bai_dang');
    }
}
