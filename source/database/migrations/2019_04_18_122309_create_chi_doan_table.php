<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiDoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_doan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenchidoan', 10);
            $table->string('nambatdau', 6);
            $table->string('namketthuc', 6);
            $table->string('gvcn');
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
        Schema::dropIfExists('chi_doan');
    }
}
