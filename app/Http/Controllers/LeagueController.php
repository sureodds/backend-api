<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Http\Resources\LeagueResource;
use App\Models\League;
use App\Models\Season;
use App\Services\FootBallApiService;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class LeagueController extends Controller
{
    public FootBallApiService $footballService;

    public function __construct()
    {
        $this->footballService = new FootBallApiService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $leagues = QueryBuilder::for(League::class)
        ->allowFilters([
            'name',

        ])
        ->paginate($request->per_page ?:5);

        $leagues = LeagueResource::collection($leagues)->response()->getData(true);

        return $this->success(
            message:"League Fetched successfully",
            data: $leagues,
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }



    /**
     * Display the specified resource.
     */
    public function show(League $league)
    {
        //
        return $this->success(
            message: "League deleted successfully",
            data: new LeagueResource($league),
            status: HttpStatusCode::SUCCESSFUL->value
        );
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league)
    {
        //
        $league->delete();
        return $this->success(
            message: "League deleted successfully",
            data: $league,
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }

    public function getFixturesByLeagueId(string $id) : mixed
    {
        $league = League::find($id);
        $season = Season::where('league_id', $league->id)->orderBy('year')->first();

        try {
            //code...
            $response = $this->footballService->getFeatureByLeague($league->league_api_id, $season->year);

            return $this->success(
                message: "League features fetched successfully",
                data: $response,
                status: HttpStatusCode::SUCCESSFUL->value
            );

        } catch (\Throwable $th) {
            //throw $th;
            return $this->failure(
                message:"Oops, something went wrong",
                status: HttpStatusCode::BAD_REQUEST->value
            );
        }
    }
}