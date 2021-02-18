<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artical;
use Faker\Generator as Faker;

$factory->define(Artical::class, function (Faker $faker) {
    return [
        "title" => $faker->text(10),
        "body" => $faker->text(40),
        'image' => $faker->image('public/storage/images',640,480, null, false),
    ];
});
