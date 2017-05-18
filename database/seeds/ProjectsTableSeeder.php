<?php

  use Faker\Factory as Faker;

  use Illuminate\Database\Seeder;

  class ProjectsTableSeeder extends Seeder {

    public function run()
    {

      $faker = Faker::create();

      foreach(range(1,10) as $index)
      {

        App\Project::create([
          'client_id' => $faker->numberBetween($min = 1, $max = 10),
          'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
          'handle' => ''
        ]);
      }
    }
  }
