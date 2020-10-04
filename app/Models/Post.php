<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function authors()
    {
        return $this->morphedByMany(User::class, 'authorable');
    }

    public function categories()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }

    public function tags()
    {
        return $this->morphedByMany(Tag::class, 'taggable');
    }

    public function comments()
    {
       return $this->morphMany(Comment::class, 'commentable');
    }
}
