<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Http\Clients\FootballApiClient;
use App\Http\Clients\RapidFootballClient;
use App\Http\Resources\BookMarkerResource;
use App\Http\Resources\LeagueResource;
use App\Models\BookMarker;
use App\Models\League;
use App\Services\FootBallApiService;
use App\Services\RapidFootballService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TriggerThiryPartyController extends Controller
{

    public function __construct(
        public RapidFootballClient $rapidFootballClient,
        public RapidFootballService $rapidFootballService
    )
    {

    }

    public function populateBookMarker(): JsonResponse
    {
       try {
            //code...

            $response = $this->rapidFootballService->getBookMarker();
            $bookMarkers = BookMarker::all();

            return $this->success(
                message: "BookMarker populated successfully",
                data: BookMarkerResource::collection($bookMarkers)->response()->getData(true),
                status: 200
            );
       } catch (\Throwable $th) {
            //throw $th;
            Log::info($th);
            return $this->failure(
                message: "Bookmartker failed to populate",
                status: HttpStatusCode::BAD_REQUEST->value
            );
        }
    }

    public function populateLeague() : JsonResponse
    {
       try {
            //code...

            $this->rapidFootballService->getLeagues();
            $leagues = League::all();

            return $this->success(
                message: "Leagues populated successfully",
                data: LeagueResource::collection($leagues)->response()->getData(true),
                status: 200
            );
        } catch (\Throwable $th) {
            //throw $th;
            Log::info($th);
            return $this->failure(
                message: "League failed to populate",
                status: HttpStatusCode::BAD_REQUEST->value
            );
        }
    }

    public function getFeatureById(int $feature_id) : mixed
    {
        $response = $this->rapidFootballService->getFeatureById($feature_id);

        return $response[0];

    }
}
