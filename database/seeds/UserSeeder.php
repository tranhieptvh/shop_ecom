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
        DB::table('users')->insert([
            [
                'name' => 'Trần Văn Hiệp',
                'email' => 'tranhieptvh@gmail.com',
                'password' => Hash::make(123456),
                'date_of_birth' => '30-07-1997',
                'phone' => '0985250657',
                'address' => 'Vĩnh Phúc',
                'role_id' => '1',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ]);
    }
}
