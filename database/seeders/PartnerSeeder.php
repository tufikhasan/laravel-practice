<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'partners' )->insert( [
            'title_info'  => '05 - PARTNERS',
            'title'       => 'I proud to have collaborated with some awesome companies',
            'description' => 'I\'m a bit of a digital product junky. Over the years, I\'ve used hundreds of web and mobile apps in different industries and verticals. Eventually, I decided that it would be a fun challenge to try designing and building my own.',
        ] );
    }
}
