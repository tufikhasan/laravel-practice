<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'footers' )->insert( [
            'number'             => '+81383 766 284',
            'short_description'  => 'There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form is also here.',
            'country'            => 'United States',
            'address'            => '123 Example Street',
            'email'              => 'info@example.com',
            'social_title'       => 'Follow us on social media',
            'social_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'facebook'           => 'https://www.facebook.com/example',
            'twitter'            => 'https://twitter.com/example',
            'linkedIn'           => 'https://www.linkedin.com/company/example',
            'copyright'          => 'Copyright @ tufikhasan.com 2023 All right Reserved',
        ] );
    }
}
