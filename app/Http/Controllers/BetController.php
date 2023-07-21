<?php

namespace App\Http\Controllers;

use App\Http\Resources\BetResource;
use App\Models\Bet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        //

        $bets = Bet::all();
        return $this->success(
            message: "Bets return successfully",
            data: BetResource::collection($bets),
            status: 200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $bet = Bet::create(['name' => $request->name]);
        return $this->success(
            message: "Bet created successfully",
            data: new BetResource($bet),
            status: 201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Bet $bet)
    {
        //
        return $this->success(
            message: "Bet display successfully",
            data: $bet,
            status: 200
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bet $bet)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bet $bet)
    {
        $bet->delete();
        return $this->success(
            message: "Bet deleted successfully",
            data: $bet,
            status: 200
        );
    }
}