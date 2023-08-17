<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'home_slides' )->insert( [
            'title'       => 'I will give you Best Product in the shortest time. updated',
            'short_title' => 'I\'m a Rasalina based product design & visual designer focused on crafting clean & user friendly experiences',
            'video_url'   => 'video_url',
            'home_slide'  => 'image.jpg',
        ] );
    }
}
