<?php

namespace App\Http\Controllers;

use App\Models\DestinationTag;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiCollection;
use Illuminate\Http\Request;

class DestinationTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = DestinationTag::paginate();

        return new ApiCollection($tag);
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
    public function show(DestinationTag $destinationTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DestinationTag $destinationTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DestinationTag $destinationTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestinationTag $destinationTag)
    {
        //
    }
}
