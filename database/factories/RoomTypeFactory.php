<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RoomType;
use Faker\Generator as Faker;

$factory->define(RoomType::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence(),
        'deleted_at' => $faker->optional()->dateTime(),
    ];
});
