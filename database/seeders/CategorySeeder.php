<?php

namespace Database\Seeders;

use App\Models\Category;
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
                'name' => 'Success',
                'slug' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leadership',
                'slug' => 'leadership',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Motivation',
                'slug' => 'motivation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Productivity',
                'slug' => 'productivity',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Self Improvement',
                'slug' => 'self improvement',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2. Lifestyle
            [
                'name' => 'Health',
                'slug' => 'health',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mindfulness',
                'slug' => 'mindfulness',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Relationships',
                'slug' => 'relationships',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //3. Leadership
            [
                'name' => 'Entrepreneurship',
                'slug' => 'entrepreneurship',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        Category::insert($categories);
    }
}
