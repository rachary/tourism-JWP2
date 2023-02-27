<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * User Authentication
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();

            $user = Auth::user();

            return $user;

        } 

        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'Email atau password salah! hubungi administrator',
        ]);   
    }

    /**
     * Logout user
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }

    /**
     * Get User with Authenticated
     * 
     * @return 
     */
    public function user(Request $request)
    {
        $user = $request->user();
        return response()->json(['id' => $user->id, 'email' => $user->email, 'role' => $user->role]);
    }
}
