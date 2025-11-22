<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        // ユーザーを自動生成する記述（Laravel 6方式）
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'name' => $faker->company,
        'address' => $faker->address,
        'comment' => $faker->realText(50),
        'image' => null,
    ];
});
