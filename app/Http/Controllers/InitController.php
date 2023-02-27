<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InitController extends Controller
{
    /**
     * Get data
     * 
     * @return array
     */
    public function dashboard() 
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        $user->load('userRole');

        return [
            'user' => $user
        ];
    }
}
