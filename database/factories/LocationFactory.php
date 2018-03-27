<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
      'name' => $faker->streetName,
      'zipcode' => $faker->postcode,
      'city' => $faker->city,
      'country' => 'Nederland',
      'address' => $faker->streetAddress
    ];
});
