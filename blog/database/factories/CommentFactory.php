<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Comment::class, function (Faker $faker) {
    $user_id = User::first()->value('id');

    return [
        'user_id' => $user_id,
        'comment' =>  $faker->sentence,
        'commentable_id' => $user_id,
    ];
});
