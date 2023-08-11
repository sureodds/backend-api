<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForecastMatch extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        
        'fixture_id',
        'book_marker_id' ,
        'bet_id',
        'forecast_odd',
        'prediction_value' ,
        'prediction_odd',
        'user_id',
        'is_submitted',
        'code'

    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
