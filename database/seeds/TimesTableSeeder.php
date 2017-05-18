<?php

  use Faker\Factory as Faker;

  use Illuminate\Database\Seeder;

  class TimesTableSeeder extends Seeder {

    public function run()
    {

      $faker = Faker::create();

      foreach(range(1,10) as $index)
      {

        App\Time::create([
          'task_id' => $faker->numberBetween(),
          'user_id' => $faker->numberBetween(),
          'time_span' => $faker->time('H:i'),
          'value_per_hour' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 100),
          'title' => $faker->sentence($nbWords = 3),
          'handle' => $faker->sentence($nbWords = 3)
        ]);
      }
    }
  }
