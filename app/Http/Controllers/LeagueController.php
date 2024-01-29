<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Http\Resources\LeagueResource;
use App\Models\League;
use App\Models\Season;
use App\Services\RapidFootballService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;


class LeagueController extends Controller
{
    public RapidFootballService $footballService;

    public function __construct()
    {
        $this->footballService = new RapidFootballService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : JsonResponse
    {
        //
        $leagues = QueryBuilder::for(League::class)
        ->allowedFilters([
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
    public function show(League $league) : JsonResponse
    {
        //
        return $this->success(
            message: "League retrieved successfully",
            data: new LeagueResource($league),
            status: HttpStatusCode::SUCCESSFUL->value
        );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league) : JsonResponse
    {
        //
        $league->delete();
        return $this->success(
            message: "League deleted successfully",
            data: $league,
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }

    public function getFixturesByLeagueId(Request $request, string $id) : JsonResponse
    {

        $league = League::find($id);
        $season = Season::where('league_id', $league->id)->orderByDesc('year')->first();
        $cacheKey = "league_features_{$league->id}_{$season->year}";

        // Retrieve the paginated response from the cache if it exists
        $paginatedResponse = Cache::remember($cacheKey, $minutes = 60, function () use ($league, $season) {
            try {
                $response = $this->footballService->getFeatureByLeague($league->league_api_id, $season->year);


                $page = request('page', 1);
                $perPage = 10; // Adjust the number of items per page as needed
                $totalItems = count($response);

                $paginator = new LengthAwarePaginator(
                    $response,
                    $totalItems,
                    $perPage,
                    $page,
                    ['path' => request()->url()]
                );

                return $paginator;
                //@codeCoverageIgnoreStart
            } catch (\Throwable $th) {
                return null;
            }
        });

        if ($paginatedResponse === null) {
            return $this->failure(
                message: "Oops, something went wrong",
                status: HttpStatusCode::BAD_REQUEST->value
            );
        }
        //@codeCoverageIgnoreEnd
        return $this->success(
            message: "Fixtures retrieved successfully",
            data: $paginatedResponse,
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }
}
