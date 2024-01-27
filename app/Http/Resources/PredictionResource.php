<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use WinningRate;

class PredictionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'prediction',
            'attributes' => [
                'copies' => $this->copies,
                'is_submitted' => $this->is_submitted,
            ],

            'relationships' => [
                'user' => [
                    'id' => $this->user->id,
                    'username' => $this->user->username,
                    'profile_pricture' => $this->user->profile_picture,
                    'winning_rate' => WinningRate::calculate($this->user)
                ],
                'book_marker' => [
                    'id' => $this->bookMarker->id,
                    'name' => $this->bookMarker->name,
                    'logo' => $this->bookMarker->logo,
                    'code' => $this->code
                ],
                'games' => GameResource::collection($this->games)
            ]
        ];
    }
}
