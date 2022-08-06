<?php

namespace App\Traits;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLikes
{
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function likeCount(): int
    {
        return $this->likes()->count();
    }

    public function isLikedByViewer(): bool
    {
        $ip = request()->ip();
        $userAgent = request()->userAgent();

        if (auth()->user()) {
            return $this->likes->contains('user_id', auth()->id());
        }

        if ($this->ip = $ip && $this->user_agent = $userAgent) {
            return $this->likes()
                ->whereIp($ip)
                ->whereUserAgent($userAgent)
                ->count();
        }

        return false;
    }
}
