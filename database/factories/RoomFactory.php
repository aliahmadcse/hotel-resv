<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;


$factory->define(Room::class, function (Faker $faker) {
    $roomTypes = DB::table('room_types')->pluck('id')->all();

    return [
        'number' => $faker->unique()->randomNumber(),
        'room_type_id' => $faker->randomElement($roomTypes),
    ];
});
