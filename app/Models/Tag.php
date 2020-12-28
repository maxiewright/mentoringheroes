<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Tags for the post model
     *
     * @return MorphToMany
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable')
            ->withTimestamps();
    }
}
