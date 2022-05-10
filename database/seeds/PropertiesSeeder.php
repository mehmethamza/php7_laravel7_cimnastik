<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propeties = ["özel eğitim desteği","bireysel koçluk","ek gıda desteği","özel diyet","teknik gelişim","besyo hazırlığı"];
        foreach ($propeties as $x) {
            DB::table("properties")->insert([
                "name" => $x,
                "type" => "standart"
            ]);
        }

    }
}
