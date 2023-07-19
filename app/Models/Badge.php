<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Badge extends Model implements HasMedia
{
    use HasFactory,HasUuids, InteractsWithMedia;

    protected $fillable = [
        'title',
        'image',
        'level'
    ];

    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_badge');
    }

    /** @codeCoverageIgnore */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('image')
        );
    }

}