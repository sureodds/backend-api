<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProbabilityResource;
use App\Models\Bet;
use App\Models\Probability;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProbabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        //

        $probabilitys = Probability::all();
        return $this->success(
            message: "Bets return successfully",
            data: ProbabilityResource::collection($probabilitys),
            status: 200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $probability = Probability::create(['name' => $request->name]);
        return $this->success(
            message: "Bet created successfully",
            data: new ProbabilityResource($probability),
            status: 201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Probability $probability)
    {
        //
        return $this->success(
            message: "Bet display successfully",
            data: $probability,
            status: 200
        );
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Probability $probability)
    {
        $probability->delete();
        return $this->success(
            message: "Bet deleted successfully",
            data: $probability,
            status: 200
        );
    }
}
