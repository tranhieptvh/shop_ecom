<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            [
                'phone' => '',
                'address' => '',
                'email' => '',
                'zalo_qr' => '',
                'bank' => '',
                'bank_qr' => '',
                'vat' => 10,
                'ship_fee' => 0,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ]);
    }
}
