<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\ApiCollection;
use App\Models\EventImage;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::with([
            'eventImages',
        ])
        ->paginate();

        return new ApiCollection($event);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $validated = $request->validated();

        $event = new Event();
        $event->name = $validated['name'];
        $event->address = $validated['address'];
        $event->description = $validated['description'];
        $event->time = $validated['time'];
        $event->organizer = $validated['organizer'];
        $event->date_start = $validated['date_start'];
        $event->date_end = $validated['date_end'];
        $event->location = $validated['location'];
        $event->save();

        $images = [];
        foreach($validated['event_images'] as $image) {
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/event_images', $filename);

            $eventImage = new EventImage();
            $eventImage->filename = $filename;
            $images[] = $eventImage;
        }
        $event->eventImages()->saveMany($images);

        return response()->json([
            'message' => 'Event created'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
