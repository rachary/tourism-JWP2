<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\ApiCollection;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(EventRequest $request): Event
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
            $filename = $image->hashName();
            $image->storeAs('public/event_images', $filename);

            $eventImage = new EventImage();
            $eventImage->filename = $filename;
            $images[] = $eventImage;
        }
        $event->eventImages()->saveMany($images);

        return $event;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::find($id);

        return $event;
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Event $event)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event, $id)
    {
        $validated = $request->validated();

        $event = Event::find($id);
        $event->name = $validated['name'];
        $event->address = $validated['address'];
        $event->description = $validated['description'];
        $event->time = $validated['time'];
        $event->organizer = $validated['organizer'];
        $event->date_start = $validated['date_start'];
        $event->date_end = $validated['date_end'];
        $event->location = $validated['location'];
        $event->save();

        if ($request->has('event_images')) {
            $images = [];
        foreach($validated['event_images'] as $image) {
            $filename = $image->hashName();
            $image->storeAs('public/event_images', $filename);

            $eventImage = new EventImage();
            $eventImage->filename = $filename;
            $images[] = $eventImage;
        }
        $event->eventImages()->saveMany($images);
        }

        return $event;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return $event;
    }

    /**
     * Delete all image of the event
     * 
     * @param \App\Models\Event $event
     * @return void
     */
    public function deleteImages(Event $event)
    {
        $event->load(['eventImages']);

        if ($event->eventImages->count() === 0) {
            return;
        }

        $pathImages = [];

        /** @var \App\Models\EventImage */
        foreach($event->eventImages as $image) {
            $pathImages[] = $image->imagePath() . $image->filename;
        }

        Storage::delete($pathImages);

        $event->eventImages()->delete();
    }
}
