<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationRequest;
use App\Http\Resources\ApiCollection;
use App\Models\DestinationImage;
use App\Models\DestinationRegion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        
        $region = DestinationRegion::firstWhere('id', $validated['destination_region_id']);
        $destination->destinationRegion()->associate($region);
        
        $destination->save();

        $destination->destinationTags()->sync($validated['destination_tags']);
        
        $images = [];
        
        foreach ($validated['destination_images'] as $image) {
            $filename = $image->hashName();
            return response()->json([
                "data" => $image->storeAs('public/destination_images', $filename)
            ], 500);
            $image->storeAs('public/destination_images', $filename);

            $destinationImage = new DestinationImage();
            $destinationImage->filename = $filename;
            $images[] = $destinationImage;
        }
        $destination->destinationImages()->saveMany($images);

        return $destination;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $destination = Destination::find($id);
        
        return $destination;
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Destination $destination)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination, $id)
    {
        $validated = $request->validated();

        $destination = Destination::find($id);
        $destination->name = $validated['name'];
        $destination->address = $validated['address'];
        $destination->description = $validated['description'];
        $destination->location = $validated['location'];
        
        $region = DestinationRegion::firstWhere('id', $validated['destination_region_id']);
        $destination->destinationRegion()->associate($region);
        
        $destination->save();

        $destination->destinationTags()->associate($validated['destination_tags']);
        
        $images = [];
        foreach ($validated['destination_images'] as $image) {
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/destination_images', $filename);

            $destinationImage = new DestinationImage();
            $destinationImage->filename = $filename;
            $images[] = $destinationImage;
        }
        $destination->destinationImages()->saveMany($images);

        return $destination;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destination = Destination::find($id);
        $destination->delete();

        return $destination;
    }

    /**
     * Delete all image of the desination.
     * 
     * @param  \App\Models\Destination  $destinations
     * @return void
     */
    public function deleteImages(Destination $destination)
    {
        $destination->load(['destinationImages']);

        if ($destination->destinationImages->count() === 0) {
            return;
        }

        $pathImages = [];

        /** @var \App\Models\DestinationImage */
        foreach($destination->destinationImages as $image) {
            $pathImages[] = $image->imagePath() . $image->filename;
        }

        Storage::delete($pathImages);

        $destination->destinationImages()->delete();
    }
}
