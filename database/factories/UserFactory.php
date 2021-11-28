<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {

    return [
        'user_name' => $faker->name.'_user',
        'name' => $faker->name ,
        'password' => bcrypt('admin'),
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'role' => 1,
        'user_id' => 1
    ];
});
$factory->define(App\Models\Complaint::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->name,
        'complaint' => $faker->sentence,

    ];
});
$factory->define(App\Models\Article::class, function (Faker $faker) {

    return [
        'title' => $faker->name,
        'en_title' => $faker->name,
        'description' => $faker->text ,
        'en_description' => $faker->text ,
        'user_id' =>1 ,
    ];
});  
$factory->define(App\Models\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'postion' => $faker->name,
    ];
});

$factory->define(App\Models\Course::class, function (Faker $faker) {

    return [
        'title' => $faker->name,
        'en_title' => $faker->name,
        'description' => $faker->text ,
        'user_id' =>1 ,
    ];
});  

$factory->define(App\Models\Department::class, function (Faker $faker) {

    return [
        'title' => $faker->name,
        'en_title' => $faker->name,
        'description' => $faker->text ,
        'user_id' =>1 ,
    ];
});  

$factory->define(App\Models\Event::class, function (Faker $faker) {

    return [
        'title' => $faker->name,
        'description' => $faker->text ,
        'user_id' =>1 ,
    ];
});  