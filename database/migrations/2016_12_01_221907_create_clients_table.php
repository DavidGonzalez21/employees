<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Clients', function (Blueprint $table) {
          $table->increments('client_id');
          $table->string('first_name', 15);
          $table->string('last_name', 15);
          $table->string('email', 50);
          $table->string('phone', 15);
          $table->string('useer_skype', 20);
          $table->string('from', 20);
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
        Schema::dropIfExists('Clients');
    }
}
