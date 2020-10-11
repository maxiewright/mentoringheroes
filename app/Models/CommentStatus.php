<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommentStatus extends Model
{
    use HasFactory;

    /**
     * statuses for the comment model
     *
     * @return HasMany
     */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
