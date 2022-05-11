<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'name' => 'Member',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ]
        ]);
    }
}
