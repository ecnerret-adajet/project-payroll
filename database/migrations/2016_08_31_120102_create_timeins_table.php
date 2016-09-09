<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeins', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('time_in');
            $table->timestamps();
        });

         Schema::create('employee_timein', function (Blueprint $table){
            $table->integer('employee_id')->unsigned()->index();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->integer('timein_id')->unsigned()->index();
            $table->foreign('timein_id')->references('id')->on('timeins')->onDelete('cascade');
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
        Schema::drop('employee_timein');
        Schema::drop('timeins');
    }
}
