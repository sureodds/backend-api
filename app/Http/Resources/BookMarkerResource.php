<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\BookMarker */
class BookMarkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'type' => 'book_marker',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'logo' => $this->logo,
                'link' => $this->link,
                'code' => $this->code
            ]
        ];

    }
}