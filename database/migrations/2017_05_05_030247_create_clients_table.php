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
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('address');
            $table->string('address_2');
            $table->string('phone');
            $table->string('email');
            $table->string('handle');
            $table->timestamps();
        });

        Schema::create('client_user', function (Blueprint $table) {
            $table->integer('client_id');
            $table->integer('user_id');
            $table->primary(['client_id', 'user_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('client_user');
    }
}
