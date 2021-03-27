<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'seo_title',
        'image_path',
        'excerpt',
        'body',
        'post_status_id',
        'is_featured',
        'published_at',
    ];

    protected $dates = [
        'published_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($post){
            if ($post->status->name == 'Published' ){
                $post->published_at = now();
            }else{
                $post->published_at = null;
            }
        });
    }


    /**
     * returns article image path
     * @return string
     */
    public function getImageAttribute(): string
    {
        return Storage::disk('public')->url($this->image_path);
    }

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
        return $this->morphToMany(User::class, 'authorable')
            ->withPivot('is_lead')
            ->withTimestamps();
    }

    /**
     * get Lead Author of this post
     *
     * @return mixed|null
     */
    public function getLeadAuthorAttribute()
    {
        return $this->authors()->first();
    }

    /**
     * return the categories for this model
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category')
            ->withPivot('is_main')
            ->withTimestamps();
    }

    /**
     * Get main category for this post
     *
     * @return mixed
     */
    public function getMainCategoryAttribute()
    {
        return $this->categories
//            ->wherePivot('is_main', true)
            ->first();
    }

    /**
     * returns the tags for this model
     *
     * @return MorphToMany
     */

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')
            ->withTimestamps();
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
