<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaPlatform extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'description'];

    public function handles()
    {
        $this->hasMany(SocialMediaHandle::class, 'social_media_handle_id');
    }
}
