<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip',
        'user_agent',
    ];

    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeWhereIp($query, string $ip)
    {
        return $query->where('ip', $ip);
    }

    public function scopeWhereUserAgent($query, string $userAgent)
    {
        return $query->where('user_agent', $userAgent);
    }
}
