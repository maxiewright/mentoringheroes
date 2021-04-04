<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'title',
        'body',
        'commentable_id',
        'commentable_type',
        'published',
        'published_at',
    ];

    protected $casts = [
      'published' => 'boolean',
      'published_at' => 'date'
    ];

    protected static function booted()
    {
        parent::boot();

        static::saving(function ($comment){
            if ($comment->is_published){
                $comment->published_at = now();
            }else{
                $comment->published_at = null;
            }
        });
    }

    /**
     * Return the author of a comment
     * @return BelongsTo
     */

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * This may be morph by many other models
     *
     * @return MorphTo
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Returns Comment Replies
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
