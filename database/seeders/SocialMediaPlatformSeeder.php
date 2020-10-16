<?php

namespace Database\Seeders;

use App\Models\SocialMediaPlatform;
use Illuminate\Database\Seeder;

class SocialMediaPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = [
            [
                'name' => 'Facebook',
                'url' => 'https://www.facebook.com/',
                'description' => null,
            ],
            [
                'name' => 'Instagram',
                'url' => ' http://instagram.com/',
                'description' => null,
            ],
            [
                'name' => 'Twitter',
                'url' => ' https://twitter.com/',
                'description' => null,
            ],
            [
                'name' => 'LinkedIn',
                'url' => 'http://www.linkedin.com/',
                'description' => null,
            ],
            [
                'name' => 'Youtube',
                'url' => 'http://www.youtube.com/',
                'description' => null,
            ],
            [
                'name' => 'Pinterest',
                'url' => 'http://www.pinterest.com/',
                'description' => null,
            ],
        ];

        SocialMediaPlatform::insert($platforms);
    }
}
