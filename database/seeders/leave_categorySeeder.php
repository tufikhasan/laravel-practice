<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class leave_categorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'leave_categories' )->insert( [
            ['name' => 'vacation'],
            ['name' => 'sick leave'],
        ] );
    }
}
