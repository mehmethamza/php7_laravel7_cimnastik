<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = ["5 ve 9 yaş arası eğitim","9 ve 12 yaş arası eğitim","12 ve 16 yaş arası eğitim ","16 ve 17 yaş eğitim"];
        foreach ($products as  $x) {
            DB::table("products") -> insert([
                "name" => $x
            ]);
        }
    }
}
