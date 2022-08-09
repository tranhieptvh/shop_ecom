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
                'phone' => '0985250657',
                'address' => '28 Đại Linh, Trung Văn, Nam Từ Liêm, Hà Nội',
                'email' => 'tranhieptvh@gmail.com',
                'zalo_qr' => 'uploads/images/info/zalo_qr.png',
                'bank' => 'Vietcombank chi nhánh Tây Hồ - 1016081089 - TRAN VAN HIEP',
                'bank_qr' => 'uploads/images/info/bank_qr.png',
                'vat' => 10,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ]);
    }
}
