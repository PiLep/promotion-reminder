<?php

use App\Promotion;
use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Promotion::create([
                'product_lib' => $faker->name,
                'product_code' => $faker->ean13,
                'shop' => $faker->company,
                'number_products_needed' => $faker->randomDigit,
                'discount' => $faker->randomFloat(2, 0.1, 5),
                'minimum_basket_price' => $faker->randomFloat(2, 5, 60),
                'expiration' => $faker->date,
                'used' => $faker->boolean ,
                'notify_me' => $faker->boolean
            ]);
        }




    }
}
