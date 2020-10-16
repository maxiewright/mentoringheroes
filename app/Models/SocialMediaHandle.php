<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaHandle extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'social_media_platform_id', 'username', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function platform()
    {
        return $this->belongsTo(SocialMediaPlatform::class, 'social_media_platform_id');
    }
}
