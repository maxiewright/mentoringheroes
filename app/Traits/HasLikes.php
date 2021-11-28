<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

//    public function likedBy(): HasManyThrough
//    {
//        return $this->hasManyThrough(
//            User::class,
//            Like::class,
//            'likeable_id',
//            'id',
//            'id',
//            'user_id'
//        );
//    }


    public function likedBy(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function isLiked(): bool
    {
        if (auth()->user()) {
            return $this->likes->contains('user_id', auth()->id());
        }

        if (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            return $this->likes()
                ->whereIp($ip)
                ->whereUserAgent($userAgent)
                ->count();
        }

        return false;
    }

    public function removeLike(): bool
    {
        if (auth()->user()) {
            return  $this->likes()->where('user_id', auth()->id())->delete();
        }

        if (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            return $this->likes()
                ->whereIp($ip)
                ->whereUserAgent($userAgent)
                ->delete();
        }

        return false;
    }







}
