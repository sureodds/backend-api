<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class League extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =
    [
        'name',
        'type',
        'logo',
        'country_id',
        'league_api_id'
    ];


    public function seasons() : HasMany
    {
        return $this->hasMany(Season::class);
    }

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
