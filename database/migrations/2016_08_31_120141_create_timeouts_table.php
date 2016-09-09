<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeouts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('time_out');
            $table->timestamps();
        });

        Schema::create('employee_timeout', function (Blueprint $table){
            $table->integer('employee_id')->unsigned()->index();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->integer('timeout_id')->unsigned()->index();
            $table->foreign('timeout_id')->references('id')->on('timeouts')->onDelete('cascade');
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
        Schema::drop('employee_timeout');
        Schema::drop('timeouts');
    }
}
