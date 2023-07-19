<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\League */
class LeagueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'league',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'type' => $this->type,
                'logo' => $this->logo
            ],

        ];
    }
}