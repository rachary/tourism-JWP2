<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Handle login request
     * 
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())){
            $user = Auth::user();

            return $user;
        } 
        
        return response()->json([
            'message' => 'Email atau password salah',
        ], 401);
            
    }

    // /**
    //  * Handle response after user authenticated
    //  * 
    //  */
    // public function authenticated(Request $request, $user)
    // {
    //     return redirect()->intended();
    // }
}
