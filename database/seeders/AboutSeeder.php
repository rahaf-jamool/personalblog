<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table ('abouts')->insert ([
            'name' => 'Personal Blog',
            'short_desc' => 'Personal Blog Personal Blog',
            'long_desc' => 'Personal Blog Personal Blog Personal Blog',
            'phone' => '0956358452', 
            'twitter' => 'https://twitter.com',
            'facebook' => 'https://facebook.com',
            'youtube' => 'https://youtube.com',
            'instegram' => 'https://instegram.com',
            'gmail' => 'blog@gmail.com',
            'address' => 'kanawat',
            'job' => 'designer'
        ]);
    }
}
