<?php

namespace App\Models;

use App\Traits\HasProfilePhoto;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use HasFactory;
    use Notifiable;
    use HasProfilePhoto;

    protected static function booted()
    {
        parent::boot();

        self::created(function($user){
            $user->assignRole('subscriber');
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'about',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get all post that are authored by this user
     *
     * @return MorphToMany
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'authorable')
            ->withPivot('is_lead');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function socialAccount(): HasOne
    {
        return $this->hasOne(SocialAccount::class);
    }

    public function hasSocialAccount(): bool
    {
        return $this->socialAccount()->exists();
    }

    public function socialMediaHandles()
    {
        return $this->hasMany(SocialMediaHandle::class);
    }


}
