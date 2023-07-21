<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Http\Resources\BookMarkerResource;
use App\Http\Resources\LeagueResource;
use App\Models\Bet;
use App\Models\BookMarker;
use App\Models\League;
use App\Services\FootBallApiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TriggerThiryPartyController extends Controller
{
    //
    public FootBallApiService $footballService;

    public function __construct()
    {
        $this->footballService = new FootBallApiService();
    }

    public function populateBookMarker(): JsonResponse
    {
        try {
            //code...

            $response = $this->footballService->getBookMarker();

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

            $this->footballService->getLeagues();
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
        $response = $this->footballService->getFeatureById($feature_id);

        return $response[0];

    }

    public function populateBet() : mixed
    {

       try {
            //code...

            $this->footballService->populateBet();
            $bets = Bet::all();

            return $this->success(
                message: "Bets populated successfully",
                data: $bets,
                status: 200
            );
         } catch (\Throwable $th) {
            //throw $th;
            Log::info($th);
            return $this->failure(
                message: "Bet failed to populate",
                status: HttpStatusCode::BAD_REQUEST->value
            );
        }

    }
}