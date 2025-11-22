<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\Shop;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'shop_id' => function () {
            return factory(Shop::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->realText(20),
        'comment' => $faker->realText(100),
        'score' => $faker->numberBetween(1, 5),
        'image' => null,
        'del_flg' => 0,
    ];
});
