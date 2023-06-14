<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/** @mixin App\Models\Badge  */
class BadgeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'badge',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'image' => $this->image,
                'level' => $this->level
            ]
        ];
    }
}