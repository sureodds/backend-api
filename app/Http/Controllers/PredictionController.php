<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Http\Requests\ForeCastMatchRequest;
use App\Http\Requests\UpdateForeCastMatchRequest;
use App\Http\Resources\ForeCastMatchResource;
use App\Http\Resources\PredictionResource;
use App\Models\Game;
use App\Models\User;
use App\Models\Prediction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;


class PredictionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : JsonResponse
    {
        //
        $predictions = QueryBuilder::for(Prediction::class)->
            with(['user'])->
            allowedFilters([
                'user_id',
                'probability_odd',
                'book_marker_id'
            ])
            ->when(!empty($request->search),function (Builder $query) use ($request) {
                return $query->whereHas('user', function (Builder $query) use ($request) {
                    return $query->where('username','%', 'like', $request->input('search') . '%');
                })
                ->$query->whereHas('bookMarker', function (Builder $query) use ($request) {
                    return $query->where('name','%', 'like', $request->input('search') . '%');
                })

                ->$query->orWhere('probability_odd','%', 'like', $request->input('search') . '%' )
                ->$query->orWhere('probability', '%', 'like', $request->input('search') . '%');

            })
            ->paginate($request->per_page ?: 10);
        $predictions = PredictionResource::collection($predictions)->response()->getData(true);

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
        /** @var User $user */
        $user = auth()->user();
        $data = Arr::except($request->validated(),['preditions']);
        $predictions = Arr::except($request->validated(),['book_marker_id','is_submitted', 'code']);

        /** @var Predition $prediction */
        $prediction = $user->predictions()->create($data);

         Arr::map($predictions, function ($item, $index) use ($prediction) {
            return Game::create([
                ...$item,
                "predition_id" => $prediction->id,
            ]);
        });

        return $this->success(
            message: "Predition saved successfully",
            data: PredictionResource::collection($predictions),
            status: HttpStatusCode::SUCCESSFUL->value
        );


    }

    /**
     * Display the specified resource.
     */
    public function show(Prediction $prediction): JsonResponse
    {
        //
        return $this->success(
            message: "Predition retrived successfully",
            data:   new  PredictionResource($prediction),
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateForeCastMatchRequest $request, Prediction $prediction): JsonResponse
    {
        //
        $prediction->update(Arr::except($request->validated(),['preditions']));

        $predictions = Arr::except($request->validated(),['book_marker_id','is_submitted', 'code']);
        Arr::map($predictions, function ($item, $index) {
            Game::findOrFail($item->game_id)->update([
                'fixture_id' => $item->fixture_id,
                'probability' => $item->probability,
                'probability_odd' => $item->probability_odd
            ]);
        });

        return $this->success(
            message: "Predition updated successfully",
            data: new  PredictionResource($prediction),
            status: HttpStatusCode::SUCCESSFUL->value
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prediction $prediction) : JsonResponse
    {
        if($prediction->is_submitted === true){
            return $this->failure(
                message: "Oops, predition cannot be deleted!",
                status: HttpStatusCode::BAD_REQUEST->value
            );
        }

        $prediction->games->each->delete();
        $prediction->delete();

        return $this->success(
            message: "Predition deleted successfully",
            data: new  PredictionResource($prediction),
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }
}
