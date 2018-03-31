<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'zipcode' => $faker->postcode,
      'city' => $faker->city,
      'country' => 'Nederland',
      'address' => $faker->streetAddress
    ];
});
