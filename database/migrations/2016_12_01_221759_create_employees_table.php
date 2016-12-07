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
          $table->string('first_name', 30);
          $table->string('last_name', 30);
          $table->string('other_name', 30);
          $table->string('email', 50);
          $table->string('phone', 15);
          $table->string('user_skype', 20);
          $table->date('date_of_birth');
          $table->date('hire_date');
          $table->string('profile_photo', 255)->nullable();
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
