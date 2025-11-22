<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
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
$factory->define(User::class, function (Faker $faker) {
    return [
        // 20文字制限があるため、長い名前はカットする
        'name' => mb_substr($faker->name, 0, 20),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('password'), // パスワード固定
        'display' => 0,
        'del_flg' => 0,
        'stop_flg' => 0,
        'role' => $faker->numberBetween(0, 1),
        'remember_token' => \Illuminate\Support\Str::random(10),
    ];
});