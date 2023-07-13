<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\WelcomeNotification;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,  InteractsWithMedia, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'profile_picture',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = ['wallet', 'badges', 'bookmarkers'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    protected $appends = [
        'full_name',
        'is_verified',
        'profile_picture',
        'role'
    ];


    public function wallet() : HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function badges() : BelongsToMany
    {
        return $this->belongsToMany(Badge::class,'user_badge');
    }


    /** @codeCoverageIgnore */
    protected function profilePicture(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('profile_picture') ?: null
        );
    }

    /** @codeCoverageIgnore */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name . ' ' . $this->last_name,

        );
    }

    /** @codeCoverageIgnore */
    public function role(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getRoleNames()[0] ?? null
        );
    }

    /** @codeCoverageIgnore */
    public function isVerified(): Attribute
    {
        return Attribute::make(
            get: fn () => !is_null($this->email_verified_at),
        );
    }

    public function bookmarkers() : BelongsToMany
    {
        return $this->belongsToMany(BookMarker::class, 'book_marker_user');
    }


    public static function boot()
    {
        parent::boot();

        static::created(function(User $user){

            $user->notify(new WelcomeNotification());
        });
    }
}