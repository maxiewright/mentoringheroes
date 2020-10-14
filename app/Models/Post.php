<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'seo_title', 'image_path', 'excerpt', 'body', 'slug', 'meta_description',
        'meta_keywords', 'post_status_id', 'is_featured', 'published_at',
    ];

    protected $dates = [
        'published_at'
    ];

//    public function getImageAttribute(){
//        Storage::get($this->image_path);
//    }

    public function getImageAttribute()
    {
        return Storage::disk('public')->url($this->image_path);
    }

//    protected function defaultImageUrl()
//    {
//        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';
//    }

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
            ->withPivot('is_lead');
    }

    /**
     * get Lead Author of this post
     *
     * @return mixed|null
     */
    public function getLeadAuthorAttribute()
    {
        return $this->authors()->wherePivot('is_lead', true)->first();
    }

    /**
     * return the categories for this model
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category')
            ->withPivot('is_main');
    }

    /**
     * Get main category for this post
     *
     * @return mixed
     */
    public function getMainCategoryAttribute()
    {
        return $this->categories->first();
//            ->wherePivot('is_main', true)
//            ->first();
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
