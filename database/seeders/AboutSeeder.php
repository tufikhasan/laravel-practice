<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'abouts' )->insert( [
            'title_info'  => '01 - ABOUT ME',
            'title'       => 'I have transform your ideas into remarkable digital products',
            'short_title' => '20+ Years Experience In this game, MeansProduct Designing',

            'short_desc'  => 'I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working as a UX Designer',

            'long_desc'   => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of lorem ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the lorem ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated lorem ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',

            'about_image' => 'about.jpg',
        ] );
    }
}
