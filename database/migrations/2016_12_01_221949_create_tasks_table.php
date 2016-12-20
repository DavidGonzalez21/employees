<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Tasks', function (Blueprint $table) {
          $table->increments('task_id');
          $table->string('task_name');
          $table->date('start_work');
          $table->date('end_work');
          $table->integer('client_id')->unsigned();

          $table->foreign('client_id')->references('client_id')->on('Clients')->onDelete('cascade');
          
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
        Schema::dropIfExists('Tasks');
    }
}
