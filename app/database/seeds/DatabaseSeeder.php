<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Shop;
use App\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. ユーザーを10人作成
        $users = factory(User::class, 10)->create();

        // 2. ショップを5店舗作成
        // (make()で作って、user_idだけ上書きしてsaveする)
        $shops = factory(Shop::class, 5)->make()->each(function ($shop) use ($users) {
            $shop->user_id = $users->random()->id;
            $shop->save();
        });

        // 3. レビューを50件作成
        factory(Review::class, 50)->make()->each(function ($review) use ($users, $shops) {
            $review->user_id = $users->random()->id;
            $review->shop_id = $shops->random()->id;
            $review->save();
        });
    }
}
