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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'username'       => $faker->unique()->userName,
        'firstName'      => $faker->firstName,
        'lastName'       => $faker->lastName,
        'email'          => $faker->unique()->safeEmail,
        'activated'      => true,
        'activationCode' => bcrypt(str_random(10)),
        'password'       => 'password',
        'role'           => rand(App\Models\User::ROLE_ADMIN, App\Models\User::ROLE_CUSTOMER),
        'state'          => true
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->sentence(1),
        'description' => $faker->text(500),
        'state'       => true
    ];
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->sentence(1),
        'state'       => true
    ];
});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    $author = \App\Models\User::where('role', App\Models\User::ROLE_ADMIN)->orderByRaw('RAND()')->firstOrFail();
    return [
        'userId'      => $author->id,
        'title'       => $faker->sentence(1),
        'description' => $faker->text(500),
        'state'       => true
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'userId'  => rand(1, 50),
        'message' => $faker->text(100),
        'state'       => true
    ];
});

$factory->define(App\Models\ArticleCategory::class, function (Faker\Generator $faker) {
    return [
        'categoryId'  => rand(1, 10),
        'state'       => true
    ];
});

$factory->define(App\Models\ArticleTag::class, function (Faker\Generator $faker) {
    return [
        'tagId'  => rand(1, 50),
        'state'       => true
    ];
});