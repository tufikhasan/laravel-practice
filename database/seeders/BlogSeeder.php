<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void{
        DB::table( 'blogs' )->insert( [
            [
                'title'       => 'Exploring the Wonders of Nature',
                'description' => 'Discover the beauty of nature through this breathtaking journey.',
                'image'       => 'https://cdn.pixabay.com/photo/2019/09/17/18/48/computer-4484282_960_720.jpg',
            ],
            [
                'title'       => 'The Art of Culinary Delights',
                'description' => 'Embark on a gastronomic adventure with our mouthwatering recipes.',
                'image'       => 'https://cdn.pixabay.com/photo/2020/03/06/08/00/laptop-4906312_1280.jpg',
            ],
            [
                'title'       => 'Travel Tales: Unforgettable Adventures',
                'description' => 'Join us as we explore exotic destinations and create memories for a lifetime.',
                'image'       => 'https://cdn.pixabay.com/photo/2015/05/31/10/55/man-791049_640.jpg',
            ],
            [
                'title'       => 'Fitness and Wellness: A Holistic Approach',
                'description' => 'Learn how to maintain a healthy lifestyle and achieve inner balance.',
                'image'       => 'https://cdn.pixabay.com/photo/2017/04/05/01/16/food-2203732_640.jpg',
            ],
            [
                'title'       => 'Unlocking the Secrets of the Universe',
                'description' => 'Delve into the mysteries of space and unravel the secrets of the cosmos.',
                'image'       => 'https://cdn.pixabay.com/photo/2014/02/13/07/28/security-265130_640.jpg',
            ],
            [
                'title'       => 'The Joy of Parenthood',
                'description' => 'Discover the joys and challenges of raising a family.',
                'image'       => 'https://cdn.pixabay.com/photo/2019/01/17/23/14/work-3938875_640.jpg',
            ],
            [
                'title'       => 'Mastering the Art of Photography',
                'description' => 'Capture breathtaking moments with expert tips and techniques.',
                'image'       => 'https://cdn.pixabay.com/photo/2017/05/30/03/58/blog-2355684_640.jpg',
            ],
            [
                'title'       => 'Finding Your Zen: The Power of Meditation',
                'description' => 'Experience tranquility and mindfulness through the practice of meditation.',
                'image'       => 'https://cdn.pixabay.com/photo/2015/01/04/17/30/wordpress-588495_640.jpg',
            ],
            [
                'title'       => 'Thrill Seekers: Adventures Beyond Limits',
                'description' => 'Get your adrenaline pumping with thrilling activities and extreme sports.',
                'image'       => 'https://cdn.pixabay.com/photo/2014/08/27/07/53/blog-428950_640.jpg',
            ],
            [
                'title'       => 'Unleashing Your Creativity',
                'description' => 'Uncover your artistic potential and express yourself through various forms of creativity.',
                'image'       => 'https://cdn.pixabay.com/photo/2016/10/09/14/00/vegetable-juices-1725835_640.jpg',
            ],
        ] );
    }
}