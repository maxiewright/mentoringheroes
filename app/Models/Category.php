<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
       'parent_id', 'name', 'meta_title', 'slug'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }
}
