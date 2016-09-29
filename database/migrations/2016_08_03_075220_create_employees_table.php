<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->timestamp('birthdate');
            $table->integer('age');
            $table->string('civil_status');
            $table->string('gender');

            $table->timestamp('date_hired');
            $table->string('pagibig_no');
            $table->string('sss_no');
            $table->string('salary_type');
            
            $table->string('avatar')->default('avatar.png');

            $table->string('mobile_no');
            $table->string('telephone');
            $table->string('address');
            $table->string('permanent_address');



            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        //then set autoincrement to 1000
        DB::update("ALTER TABLE employees AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
