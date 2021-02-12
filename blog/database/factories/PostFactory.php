<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence;
    $slug = Str::slug($title, '-');
    $category_id = Category::first()->value('id');
    
    return [
        'title' => $title,
        'body' => $faker->paragraph,
        'slug' => $slug,
        'category_id' => $category_id
    ];
});
