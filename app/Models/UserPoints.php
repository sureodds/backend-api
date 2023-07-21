<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserPoints extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'points_earned',
        'odds_averge'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
