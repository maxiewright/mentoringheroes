<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image_path' => $this->faker->imageUrl(),
            'excerpt' => $this->faker->text(100),
            'body' => $this->faker->text,
            'post_status_id' => rand(1, 3),
            'is_featured' => $this->faker->boolean,
            'published_at' => $this->faker->date(),
        ];
    }
}
