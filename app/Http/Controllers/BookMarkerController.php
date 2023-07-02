<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookMarkerRequest;
use App\Http\Requests\UpdateBookMarkerRequest;
use App\Http\Resources\BookMarkerResource;
use App\Models\BookMarker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookMarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        //
        $bookMarkers = BookMarkerResource::collection(BookMarker::all());
        return $this->success(
            message: "BookMarkers return successfully",
            data: $bookMarkers,
            status: 200
        );

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookMarkerRequest $request): JsonResponse
    {
        //
        /** @var BookMarker $bookMarker */
        $bookMarker = BookMarker::create($request->validated());

        if ($request->has('logo') && !empty($request->file('logo'))) {
            $bookMarker->addMediaFromRequest('logo')->toMediaCollection('logo');
        }


        return $this->success(
            message: "BookMarker created successfully",
            data: new BookMarkerResource($bookMarker),
            status: 201
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(BookMarker $bookMarker): JsonResponse
    {
        //
        return $this->success(
            message: "BookMarker fetched successfully",
            data: new BookMarkerResource($bookMarker),
            status: 200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookMarkerRequest $request, BookMarker $bookMarker): JsonResponse
    {
        //
        $bookMarker->update($request->validated());

        if ($request->has('logo') && !empty($request->file('logo'))) {
            $bookMarker->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        return $this->success(
            message: "Bookmarker updated successfully",
            data: new BookMarkerResource($bookMarker),
            status: 200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookMarker $bookMarker): JsonResponse
    {
        //
        $bookMarker->delete();
        return $this->success(
            message: "BookMarker deleted successfully",
            data: new BookMarkerResource($bookMarker),
            status: 200
        );
    }
}
