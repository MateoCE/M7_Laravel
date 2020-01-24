<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text($maxNbChars = 255),
        'user_id'=> rand(1,150),
        'image'=> $faker->text($maxNbChars = 5),
        'post_id'=> rand(1,50)
    ];
});
