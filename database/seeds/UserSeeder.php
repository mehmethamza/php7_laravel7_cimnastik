<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table("users")->insertGetId([
            "name"=> "Mehmet Hamza Ay",
            "email" => "hamzaininal@gmail.com",
            "password" => Hash::make("12345678"),
            "role" => "seller",
        ]);
        DB::table("users_details")->insert([
            "phone" => "0325032523",
            "user_id" => $user,
        ]);
    }
}
