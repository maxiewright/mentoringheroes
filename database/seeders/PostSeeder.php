<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->hasAuthors(1)
            ->hasAttached(
                Topic::factory()->count(2),
                ['is_main' => false]
            )
            ->hasComments(3)
            ->hasTags(3)

            ->count(10)->create();
    }
}
