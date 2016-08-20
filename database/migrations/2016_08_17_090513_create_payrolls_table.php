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
            $table->integer('employee_id')->unsigned();
            $table->integer('dozen');
            $table->integer('meal_allowance');
            $table->integer('transportation');
            $table->integer('basic_pay');
            $table->integer('taxable_allowance');
            $table->integer('gross_pay');
            $table->integer('wilholding_tax');
            $table->integer('sss_contribution');
            $table->integer('philhealth_contribution');
            $table->integer('pagibig_contribution');
            $table->integer('total_deductions');
            $table->integer('net_pay');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
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
        Schema::drop('payrolls');
    }
}
