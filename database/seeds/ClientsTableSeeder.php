<?php

  use Faker\Factory as Faker;
  use App\Client;

  use Illuminate\Database\Seeder;

  class ClientsTableSeeder extends Seeder {

    public function run()
    {

      $faker = Faker::create();

      foreach(range(1,10) as $index)
      {

        App\Client::create([
          'title' => $faker->sentence(3),
          'handle' => $faker->slug(3),
        ]);
      }
    }
  }
