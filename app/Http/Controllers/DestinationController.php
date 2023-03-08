<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationRequest;
use App\Http\Resources\ApiCollection;
use App\Models\DestinationImage;
use App\Models\DestinationTag;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destination = Destination::with([
            'destinationRegion', 
            'destinationTags', 
            'destinationImages'
        ])
        ->paginate();

        return new ApiCollection($destination);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DestinationRequest $request)
    {
        $validated = $request->validated();

        $destination = new Destination();
        $destination->name = $validated['name'];
        $destination->address = $validated['address'];
        $destination->description = $validated['description'];
        $destination->location = $validated['location'];
        $destination->destination_region_id = $validated['destination_region_id'];
        $destination->save();


        $destination->destinationTags()->attach($validated['destination_tags']);
        
        $images = [];
        foreach ($validated['destination_images'] as $image) {
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/destination_images', $filename);

            $destinationImage = new DestinationImage();
            $destinationImage->filename = $filename;
            $images[] = $destinationImage;
        }
        $destination->destinationImages()->saveMany($images);

        return response()->json([
            'message' => 'Destination created'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
