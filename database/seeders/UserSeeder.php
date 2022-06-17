<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table ('users')->insert ([
            'name' => 'Admin',
            'username' => 'Super Admin',
            'email' => 'admin@mail.test',
            'password' => '$2y$10$dagajK1X6sfvLwRVV2P1lO05sGi7V071I2tCvhOISwMX/TcHsUN6m', // password
        ]);
    }
}
