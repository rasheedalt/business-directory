<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'desc' => $faker->sentence,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'website' => $faker->url,
        'active' => true,
        'view' => 0
    ];
});
