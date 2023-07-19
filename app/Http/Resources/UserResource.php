<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'user',
            'id' => strval($this->id),
            'attribute' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'full_name' => $this->full_name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'profile_picture' => $this->profile_picture,
                'country' => $this->country
            ],
            'relationships' => [
                'wallet' => [
                    'type' => 'user_wallet',
                    'id' => $this->wallet?->id,
                    'attribute' => [
                        'balance' => $this->wallet?->balance,
                        'withdrawn' => $this->wallet?->withdrawn,
                        'account_name' => $this->wallet?->account_name,
                        'account_number' => $this->wallet?->account_number,
                        'bank_name' => $this->wallet?->bank_name
                    ]
                ],
                'badge' => BadgeResource::collection($this->whenLoaded('badges')),
                'book_markers' => BookMarkerResource::collection($this->whenLoaded('bookmarkers'))
            ]
        ];
    }
}