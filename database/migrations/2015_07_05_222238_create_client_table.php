<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
              $table->increments('id');
              $table->string('firstname');
              $table->string('lastname');
              $table->string('cin');
              $table->string('phonenumber');
              $table->integer('points');
              $table->string('email');
              $table->string('gender',1);
              $table->boolean('active')->default(1);
              $table->timestamp('birthdate');
              $table->timestamps();
              $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
