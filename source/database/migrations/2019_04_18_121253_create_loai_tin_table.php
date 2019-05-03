<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_tin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idtheloai')->unsigned();
            $table->string('ten', 100);
            $table->string('tenkhongdau', 100);
            $table->string('mota', 250)->nullable();
            $table->string('tukhoa', 250)->nullable();
            $table->foreign('idtheloai')->references('id')->on('the_loai');
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
        Schema::dropIfExists('loai_tin');
    }
}
