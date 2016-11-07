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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    $name = $faker->sentence(3);

    return [
        'name'        => $name,
        'slug'        => str_slug($name),
        'description' => $faker->paragraph
    ];
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    $name = $faker->sentence(2);

    return [
        'name'        => $name,
        'slug'        => str_slug($name),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    $title = $faker->sentence;

    return [
        'user_id'     => rand(1, 10),
        'category_id' => rand(1, 10),
        'title'       => $title,
        'slug'        => str_slug($title),
        'body'        => $faker->paragraph(10),
        'featured'    => rand(0, 1),
        'status'      => $faker->randomElement(['published', 'draft'])

    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1, 10),
        'post_id' => rand(1, 50),
        'body'    => $faker->sentence
    ];
});
