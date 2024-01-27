<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'fixture_id',
        'probability_odd' ,
        'probability',
        'prediction_id',
        'match',
        'date',
        'kick_off',
        'result',

    ];

    protected $cast = [
        'result' => 'boolean',
    ];

    public function prediction() : BelongsTo
    {
        return $this->belongsTo(Prediction::class);
    }


}
