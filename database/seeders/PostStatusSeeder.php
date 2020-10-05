<?php

namespace Database\Seeders;

use App\Models\PostStatus;
use Illuminate\Database\Seeder;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Draft',
                'slug' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pending',
                'slug' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Published',
                'slug' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        PostStatus::insert($statuses);
    }
}
