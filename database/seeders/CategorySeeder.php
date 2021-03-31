<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'parent_id' => null,
                'name' => 'Success',
                'meta_title' => 'success',
                'slug' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'name' => 'Lifestyle',
                'meta_title' => 'lifestyle',
                'slug' => 'lifestyle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'name' => 'Leadership',
                'meta_title' => 'leadership',
                'slug' => 'leadership',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'name' => 'Motivation',
                'meta_title' => 'motivation',
                'slug' => 'motivation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'name' => 'Productivity',
                'meta_title' => 'productivity',
                'slug' => 'productivity',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => null,
                'name' => 'Self Improvement',
                'meta_title' => 'self-improvement',
                'slug' => 'self improvement',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2. Lifestyle
            [
                'parent_id' => 2,
                'name' => 'Health',
                'meta_title' => 'health',
                'slug' => 'health',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 2,
                'name' => 'Mindfulness',
                'meta_title' => 'mindfulness',
                'slug' => 'mindfulness',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 2,
                'name' => 'Relationships',
                'meta_title' => 'relationships',
                'slug' => 'relationships',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //3. Leadership
            [
                'parent_id' => 3,
                'name' => 'Entrepreneurship',
                'meta_title' => 'entrepreneurship',
                'slug' => 'entrepreneurship',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        Topic::insert($categories);
    }
}
