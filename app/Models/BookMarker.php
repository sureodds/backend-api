<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BookMarker extends Model implements HasMedia
{
    use HasFactory, HasUuids, InteractsWithMedia;

    protected $fillable = [
        'name',
        'logo',
        'code',
        'link'
    ];

    /** @codeCoverageIgnore */
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('logo')
        );
    }

 }