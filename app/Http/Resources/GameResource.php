<?php

namespace App\Http\Resources;

use App\Http\Controllers\TriggerThiryPartyController;
use App\Services\RapidFootballService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use WinningRate;

/** @mixin \App\Models\Game */
class GameResource extends JsonResource
{

    public RapidFootballService  $rapidFootballService;

    public function __construct()
    {
        $this->rapidFootballService = new RapidFootballService();
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        return [
            'type' => 'game',
            'id' => $this->id,
            'attributes' => [
                'date' => $this->date,
                'kick_off' => date('H:i', $this->kick_off),
                'match'=> json_decode($this->match),
                'probability' => $this->probability,
                'probability_odd' => $this->probability_odd
            ],

        ];
    }
}
