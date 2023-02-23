<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ApiCollection;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ApiCollection
    {
        
        $user = User::paginate();

        return new ApiCollection($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): User
    {
        $validated = $request->validated();

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->phone = $validated['phone'];

        $role = UserRole::firstWhere('name', $validated['role']);
        $user->user_role_id = $role->id;
        $user->save();

        return $user;
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(User $user)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(User $user)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, User $user)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(User $user)
    // {
    //     //
    // }
}
