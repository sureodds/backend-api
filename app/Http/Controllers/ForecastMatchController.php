<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Http\Requests\ForeCastMatchRequest;
use App\Http\Requests\UpdateForeCastMatchRequest;
use App\Http\Resources\ForeCastMatchResource;
use App\Models\ForecastMatch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\QueryBuilder\QueryBuilder;

class ForecastMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : JsonResponse
    {
        //
        $predictions = QueryBuilder::for(ForecastMatch::class)->
            allowedFilters([
                'user_id',
                'prediction_value',
                'book_marker_id'
            ])
            ->paginate($request->per_page ?: 10);
        $predictions = ForeCastMatchResource::collection($predictions)->response()->getData(true);

        return $this->allList(
            $predictions,
            message: "Forecasts retrieved successfully",
        );
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(ForeCastMatchRequest $request): JsonResponse
    {
        $user = auth()->user();


        $predictions = Arr::map($request->predictions, function ($prediction, $index) use ($user) {
            return ForecastMatch::create([
                ...$prediction,
                "user_id" => $user->id,
            ]);
        });

        return $this->success(
            message: "Forecast saved successfully",
            data: ForeCastMatchResource::collection($predictions),
            status: HttpStatusCode::SUCCESSFUL->value
        );


    }

    /**
     * Display the specified resource.
     */
    public function show(ForecastMatch $forecastMatch): JsonResponse
    {
        //
        return $this->success(
            message: "Forecast retrived successfully",
            data:   new  ForeCastMatchResource($forecastMatch),
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateForeCastMatchRequest $request, ForecastMatch $forecastMatch): JsonResponse
    {
        //
        $forecastMatch->update($request->validated());
        return $this->success(
            message: "Bookmarker updated successfully",
            data: new  ForeCastMatchResource($forecastMatch),
            status: 200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForecastMatch $forecastMatch) : JsonResponse
    {
        $forecastMatch->delete();
        return $this->success(
            message: "Forecast deleted successfully",
            data: new  ForeCastMatchResource($forecastMatch),
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }
}