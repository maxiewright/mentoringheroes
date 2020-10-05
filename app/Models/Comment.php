<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'user_id', 'body', 'commentable_id', 'commentable_type', 'comment_status_id', 'approved_at',
    ];


    /**
     * Return the author of a comment
     * @return BelongsTo
     */

    public function author()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * This may be morph by many other models
     *
     * @return MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Status of comments
     *
     * @return BelongsTo
     */

    public function status()
    {
        return $this->belongsTo(CommentStatus::class, 'comment_status_id');
    }
}
