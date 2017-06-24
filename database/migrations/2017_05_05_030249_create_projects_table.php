<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('title', 100);
            $table->string('projected_cost', 10)->nullable();
            $table->string('current_cost', 10)->nullable();
            $table->string('planned_hours', 10)->nullable();
            $table->string('worked_hours', 10)->nullable();
            $table->string('deadline_date')->nullable();
            $table->string('hourly_rate', 10)->nullable();
            $table->timestamps();
        });

        Schema::create('project_user', function (Blueprint $table) {
            $table->integer('project_id');
            $table->integer('user_id');
            $table->primary(['project_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_user');
    }
}
