<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        //
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date('Y-m-d', '2002-12-30'),
        'email' => $faker->unique()->safeEmail,
        'rg' => $faker->unique()->numberBetween($min = 00001, $max = 99999),
        'cpf' => $faker->unique()->numberBetween($min = 10000000000, $max= 99999999999),
        'phone'=> $faker->phoneNumber,
        'address' => $faker->streetName,
        'number' => $faker->numberBetween($min = 1, $max = 99999),
        'neighborhood' => $faker->city,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->numberBetween($min = 20000, $max=23000),
    ];
});
