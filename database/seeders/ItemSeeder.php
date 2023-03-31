<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(["name" => "ジーンズ", "type" => "ボトムス", "detail" => "白", "User_id" => 0]);

        for ($i = 1; $i <= 100; $i++) {
            Item::create([
                "name" => "ツイードワンピース",
                "type" => "ワンピース",
                "detail" => "ツイード" . $i,
                "user_id" => rand(4, 10) * 10,
            ]);
        }
    }
}
