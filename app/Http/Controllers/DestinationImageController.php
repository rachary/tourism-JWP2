<?php

namespace App\Http\Controllers;

use App\Models\DestinationImage;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiCollection;
use Illuminate\Http\Request;

class DestinationImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $image = DestinationImage::paginate();

        return new ApiCollection($image);
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
    public function show(DestinationImage $destinationImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DestinationImage $destinationImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DestinationImage $destinationImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestinationImage $destinationImage)
    {
        //
    }
}
