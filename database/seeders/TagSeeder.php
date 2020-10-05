<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'motivation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'public speaking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'inspiration',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'lifestyle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'health',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'productivity',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'focus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'relationship',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'entrepreneurship',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'impact',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'self improvement',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'positivity',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mindful',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mindfulness',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'best self',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'quote',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Tag::insert($tags);
    }
}
