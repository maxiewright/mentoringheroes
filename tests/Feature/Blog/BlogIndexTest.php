<?php

namespace Tests\Feature\Blog;

use App\Models\Post;
use Tests\TestCase;

class BlogIndexTest extends TestCase
{

    public function test_index_shows_blog_posts()
    {
        $this->withoutExceptionHandling();
        Post::create([
            'title' => 'A post',
            'image_path' => '/somewhere/inthe/computer',
            'body' => 'This is the body of the post',
            'view_count' => 2,
            'is_featured' => true,
//            'is_published',
//            'published_at',
        ]);

        $this->get('/')
            ->assertSuccessful()
            ->assertSee('Mentoring Heroes');
    }
}
