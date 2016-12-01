<?php

use Illuminate\Support\Facades\Schema;
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
      Schema::create('Employees', function (Blueprint $table) {
          $table->increments('employee_id');
          $table->string('first_name', 15);
          $table->string('last_name', 15);
          $table->string('other_name', 15);
          $table->string('email', 50);
          $table->string('phone', 15);
          $table->string('user_skype', 20);
          $table->date('date_of_brth');
          $table->date('hire_date');
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
        Schema::dropIfExists('Employees');
    }
}
