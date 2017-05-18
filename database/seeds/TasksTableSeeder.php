<?php

  use Faker\Factory as Faker;

  use Illuminate\Database\Seeder;

  class TasksTableSeeder extends Seeder {

    public function run()
    {

      $faker = Faker::create();

      foreach(range(1,10) as $index)
      {

        App\Task::create([
          'project_id' => $faker->numberBetween($min = 1, $max = 10),
          'handle' => $faker->sentence($nbWords = 3, $variableNbWords = true),
          'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
          'due_date' => $faker->dateTimeThisYear($max = 'now')
        ]);
      }
    }
  }
