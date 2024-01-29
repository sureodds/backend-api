<?php

namespace App\Models;

use App\Services\RapidFootballService;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Game extends Model
{
    use HasFactory, HasUuids;

    public RapidFootballService $rapidFootBallService;

    public function __construct()
    {
        $this->rapidFootBallService = new RapidFootballService();
    }

    protected $table = 'games';

    protected $fillable = [
        'id',
        'fixture_id',
        'probability_odd' ,
        'probability_id',
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


    public static function boot() : void
    {
        parent::boot();

        static::created(function(Game $game){

            $fixture =  $game->rapidFootBallService->getFeatureById($game->fixture_id);
            dd($fixture);
            $game->match = json_encode([
                'team_home' => [
                   'name' => $fixture['teams']['home']['name'],
                   'logo' => $fixture['teams']['homo']['logo'],
                ],

                'team_away' => [
                    'name' => $fixture['teams']['away']['name'],
                    'logo' => $fixture['teams']['away']['logo'],
                 ]
            ]);
            $game->date = $fixture['fixture']['date'];
            $game->kick_off = $fixture['fixture']['timestamp'];
            $game->timezone = $fixture['fixture']['timezone'];
            $game->save();

        });
    }
}
