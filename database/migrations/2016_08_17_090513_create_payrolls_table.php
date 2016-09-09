<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->timestamp('start_period');
            $table->timestamp('end_period');
            /* Temporary dozen per day variable */
            $table->integer('dozen');
            $table->integer('gross_net');

            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('employee_payroll', function (Blueprint $table){
            $table->integer('employee_id')->unsigned()->index();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->integer('payroll_id')->unsigned()->index();
            $table->foreign('payroll_id')->references('id')->on('payrolls')->onDelete('cascade');
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
        Schema::drop('employee_payroll');
        Schema::drop('payrolls');
    }
}
