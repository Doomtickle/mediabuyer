<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'Daron Adkins',
        'email' => 'daron.adkins@gmail.com',
        'title' => 'Web Developer',
        'phone' => '850-866-6248',
        'address' => '3706 Hwy 98, Suite103, Mexico Beach FL',
        'company' => 'Kerigan Marketing Associates',
        'role' => 'admin',
        'password' => $password ?: $password = bcrypt('23wesdxc'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->company,
        'clientIndustry' => $faker->jobTitle
    ];
});

$factory->define(App\MediaPlan::class, function (Faker\Generator $faker) {

    $start = Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
    $end = Carbon::createFromFormat('Y-m-d H:i:s', $start)->addDays(25);

    return [
        'title' => $faker->colorName,
        'client_id' => factory('App\Client')->create()->id,
        'flight_date_start' => $start->toDateString(),
        'flight_date_end' => $end->toDateString(),
    ];
});
