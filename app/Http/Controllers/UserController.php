<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        //
        $users = User::whereHas('roles', function ($query){
            $query->where('name', 'user');
        });

        $users = UserResource::collection($users->paginate(20))->response()->getData(true);
        
        return $this->allList(
            $users,
            message: "Users return successfully",
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id) : JsonResponse
    {
        //
        $user = User::find($id);
        return $this->success(
            message: "User return successfully",
            data: new UserResource($user),
            status: 200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, int $id) : JsonResponse
    {
        //
        $user = User::find($id);
        $user->update($request->validated());

        if($request->has('profile_picture')&& !empty($request->file('profile_picture'))) {
            $user->addMediaFromRequest('profile_picture')->toMediaCollection('profile_picture');
        }
        return $this->success(
            message: "User updated successfully",
            data: new UserResource($user),
            status: 200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $user = User::find($id);
        $$user->delete();

        return $this->success(
            message: "User deleted successfully",
            data: new UserResource($user),
            status: 200
        );
    }
}