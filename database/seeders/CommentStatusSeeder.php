<?php

namespace Database\Seeders;

use App\Models\CommentStatus;
use Illuminate\Database\Seeder;

class CommentStatusSeeder extends Seeder
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
                'name' => 'Pending',
                'slug' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rejected',
                'slug' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Approved',
                'slug' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        CommentStatus::insert($statuses);
    }
}
