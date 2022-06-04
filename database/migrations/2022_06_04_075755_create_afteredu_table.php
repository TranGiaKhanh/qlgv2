<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAftereduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afteredu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('st_1');
            $table->string('tp_1');
            $table->string('gy_1');
            $table->string('st_2');
            $table->string('tp_2');
            $table->string('gy_2');
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
        Schema::dropIfExists('afteredu');
    }
}
