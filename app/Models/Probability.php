<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Probability extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'value',
        'requires_odd'
    ];

    protected $cast = [
        'requires_odd' => 'boolean'
    ];
}
