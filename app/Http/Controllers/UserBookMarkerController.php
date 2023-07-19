<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserBookmarkerRequest;
use App\Http\Resources\BookMarkerResource;
use App\Models\BookMarker;
use App\Models\User;
use Illuminate\Http\Request;

class UserBookMarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();
        $bookmarkers = BookMarkerResource::collection($user->bookmarkers);
        return $this->success(
            message: "BookMarkers return successfully",
            data: $bookmarkers,
            status: 200
        );

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserBookmarkerRequest $request)
    {
        //
        /** @var User $user */
        $user = auth()->user();

        $bookMarker = BookMarker::find($request->book_marker_id);
        $user->bookmarkers()->sync($bookMarker);

        return $this->success(
            message: "BookMarker created successfully",
            data: new BookMarkerResource($bookMarker),
            status: 201
        );

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        /** @var User $user */
        $user = auth()->user();
        $bookMarker = BookMarker::find($id);
        $user->bookmarkers()->detach($bookMarker);

        return $this->success(
            message: "BookMarker deleted successfully",
            data: new BookMarkerResource($bookMarker),
            status: 200
        );


   }
}
