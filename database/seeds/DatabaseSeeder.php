<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      Eloquent::unguard();

      // App\Client::truncate();
      $this->call('ClientsTableSeeder');
      // App\Project::truncate();
      $this->call('ProjectsTableSeeder');
      // App\Task::truncate();
      $this->call('TasksTableSeeder');
      // App\Time::truncate();
      $this->call('TimesTableSeeder');
      // App\User::truncate();
      $this->call('UsersTableSeeder');
    }
}
