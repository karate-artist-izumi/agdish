<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'title' => 'サンプルタイトルプランのタイトルが入ります',
        'description' => $faker->paragraph,
        'plan_date' => $faker->dateTimeThisYear,
        'photo' => 'https://picsum.photos/960/540',
        'ag_latitude' => $faker->latitude,
        'ag_longitude' => $faker->longitude,
        'dish_latitude' => $faker->latitude,
        'dish_longitude' => $faker->longitude,
        'price' => $faker->numberBetween($min = 1500, $max = 6000),
        'place' => $faker->city.$faker->streetAddress,
        'small_place' => $faker->city,
        'vegetable' => '白菜（代表的な野菜）',
        'map' => $faker->sentence,
    ];
});

