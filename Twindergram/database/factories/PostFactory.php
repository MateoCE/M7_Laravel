<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return[
        'text' => $faker->text($maxNbChars = 255),
        'user_id'=> rand(1,150),
        'image'=> $faker->text($maxNbChars = 5)
    ];
});
