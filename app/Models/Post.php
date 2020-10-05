<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'seo_title', 'image', 'excerpt', 'body', 'slug', 'meta_description',
        'meta_keywords', 'post_status_id', 'featured', 'published_at',
    ];

    /**
     * returns status for this model.
     *
     * @return BelongsTo
     */

    public function status()
    {
        return $this->belongsTo(PostStatus::class, 'post_status_id');
    }

    /**
     * returns the authors of this models
     *
     * @return MorphToMany
     */

    public function authors()
    {
        return $this->morphToMany(User::class, 'authorable');
    }

    /**
     * return the categories for this model
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    /**
     * returns the tags for this model
     *
     * @return MorphToMany
     */

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * returns the comments for this model
     *
     * @return MorphMany
     */
    public function comments()
    {
       return $this->morphMany(Comment::class, 'commentable');
    }
}
