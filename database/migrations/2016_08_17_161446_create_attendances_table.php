<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('time_in');
            $table->timestamp('time_out');
            $table->timestamp('break_in');
            $table->timestamp('break_out');
            $table->timestamps();
        });

        Schema::create('attendance_employee', function (Blueprint $table){
            $table->integer('employee_id')->unsigned()->index();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->integer('attendance_id')->unsigned()->index();
            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('cascade');

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
        Schema::drop('attendance_employee');
        Schema::drop('attendances');
    }
}
