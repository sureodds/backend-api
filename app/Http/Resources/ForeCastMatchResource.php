<?php

namespace App\Http\Resources;

use App\Http\Controllers\TriggerThiryPartyController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ForecastMatch */
class ForeCastMatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $feature = (new TriggerThiryPartyController)->getFeatureById($this->fixture_id);

        return [
            'type' => 'prediction',
            'id' => $this->id,
            'attributes' => [
                'date' => $feature['fixture']['date'],
                'kick_off' => date('H:i', $feature['fixture']['timestamp']),
                'match'=> $feature['teams']['home']['name']  .' VS '. $feature['teams']['away']['name'],
                'forecast' => $this->forecast,
                'prediction_value' => $this->prediction_value,
                'prediction_odd' => $this->prediction_odd,
                'odds' => $this->forecast_odd,
                'result' => $this->result,
                'copied' => 0,
                'code' => $this->code
            ],
            'relationships' => [
                'user' => [
                    'id' => $this->user->id,
                    'first_name' => $this->user->first_name,
                    'last_name' => $this->user->last_name
                ]
            ]

        ];
    }
}
