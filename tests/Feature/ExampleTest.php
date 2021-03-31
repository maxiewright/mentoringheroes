<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Post::factory()
            ->hasAuthors(1)
            ->hasAttached(
                Category::factory()->count(2),
                ['is_main' => false]
            )
            ->hasComments(3)
            ->hasTags(3)
            ->create();

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
