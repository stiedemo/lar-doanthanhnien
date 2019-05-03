<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiachiXaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diachi_xa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('xa');
            $table->integer('idhuyen')->unsigned();
            $table->foreign('idhuyen')->references('id')->on('diachi_huyen');
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
        Schema::dropIfExists('diachi_xa');
    }
}
