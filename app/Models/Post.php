<?php

namespace App\Models;

use App\Traits\HasComments;
use App\Traits\HasLikes;

use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory,
        HasSlug,
        HasLikes,
        HasComments,
        HasTags;

    protected $fillable = [
        'title',
        'slug',
        'image_path',
        'body',
        'view_count',
        'is_featured',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'date',
    ];

    protected $withCount = [
        'likes'
    ];


//    public function searchableAs()
//    {
//        return 'posts_index';
//    }

    public function getScoutKey()
    {
        return $this->title;

    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted()
    {
        parent::boot();

        static::saving(function ($post){
            if ($post->is_published){
                $post->published_at = now();
            }else{
                $post->published_at = null;
            }
        });
    }

    public function excerpt(int $limit = 300): string
    {
        return Str::limit(strip_tags($this->body), $limit);
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
     * returns the authors of this models
     *
     * @return MorphToMany
     */
    public function authors(): MorphToMany
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

        if ($this->authors()->count() == 1) {
            return $this->authors()->first();
        }

        return $this->authors()->wherePivot('is_lead', '!=', null)->first();
    }

    /**
     * return the categories for this model
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
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
            ->first();
    }


}
