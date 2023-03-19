<?php

namespace App\Http\Controllers;

use App\Models\DestinationRegion;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiCollection;
use Illuminate\Http\Request;

class DestinationRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $region = DestinationRegion::paginate();

        return new ApiCollection($region);
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
    public function show(DestinationRegion $destinationRegion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DestinationRegion $destinationRegion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DestinationRegion $destinationRegion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestinationRegion $destinationRegion)
    {
        //
    }
}
