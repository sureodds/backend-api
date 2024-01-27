<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prediction extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'book_marker_id' ,
        'user_id',
        'is_submitted',
        'code',
        'copies'

    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function bookMarker() : BelongsTo
    {
        return $this->belongsTo(BookMarker::class);
    }

    public function games() : HasMany
    {
        return $this->hasMany(Game::class);
    }
}
