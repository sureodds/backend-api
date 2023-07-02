<?php

namespace App\Http\Controllers;

use App\Http\Requests\BadgeRequest;
use App\Http\Resources\BadgeResource;
use App\Models\Badge;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    //
    public function index() : JsonResponse
    {
        $badges = BadgeResource::collection(Badge::all());

        return $this->success(
            message:"Badges return successfully",
            data: $badges,
            status: 200
        );
    }

    public function store(BadgeRequest $request) : JsonResponse
    {
        $badge = Badge::create($request->validated());

        if ($request->has('image') && !empty($request->file('image'))) {
            $badge->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return $this->success(
            message: "Badge created successfully",
            data: new BadgeResource($badge),
            status: 201
        );
    }

    public function update(Request $request, mixed $badge) : JsonResponse
    {

        $badge = Badge::find($badge);

        $badge->update(
            [
                'title' => $request->title,
                'level' => $request->level
            ]
        );

        if ($request->has('image') && !empty($request->file('image'))) {
            $badge->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return $this->success(
            message: "Badge updated successfully",
            data: new BadgeResource($badge),
            status: 200
        );
    }

    public function destroy( string $badge_id) : JsonResponse
    {
        $badge = Badge::find($badge_id);
        $badge->delete();
        return $this->success(
            message: "Badge deleted successfully",
            data: new BadgeResource($badge),
            status: 200
        );
    }

    public function show(string $badge_id) : JsonResponse
    {
        $badge = Badge::find($badge_id);

        return $this->success(
            message: "Badge fetched successfully",
            data: new BadgeResource($badge),
            status: 200
        );
    }
}