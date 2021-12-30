<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index($congregation)
    {
        $events = Event::where('congregation_id', $congregation)->get();

        return response()->json(['success' => true,'data' => $events]);
    }

    public function show($congregation, $id)
    {
        $event = Event::where('congregation_id', $congregation)->find($id);

        if(!$event)
            return response()->json(['success' => false,'message' => 'Event not found']);
            
        return response()->json(['success' => true,'data' => $event]);
    }

    public function store(EventRequest $request, $congregation)
    {
        $id_congregation = auth()->user()->congregation->id;

        if ($id_congregation != $congregation)
            return response()->json(['success' => false,'message' => 'Congregation not found'], 400);
        
        $event = auth()->user()->congregation->events()->create($request->validated());

        if(!$event)
            return response()->json(['success' => false,'message' => 'Event not created'], 500);

        return response()->json(['success' => true,'data' => $event]);
    }

    public function update(EventRequest $request, $congregation, $id)
    {
        $id_congregation = auth()->user()->congregation->id;

        if ($id_congregation != $congregation)
            return response()->json(['success' => false,'message' => 'Congregation not found'], 400);

        $event = auth()->user()->congregation->events()->find($id);

        if(!$event)
            return response()->json(['success' => false,'message' => 'Event not found'], 400);

        $event->update($request->validated());

        if(!$event)
            return response()->json(['success' => false,'message' => 'Event not updated'], 500);
        
        return response()->json(['success' => true,'data' => $event]);
    }

    public function search(Request $request){
        // $filters = $request->except('_token');
        $events = Event::where('title','LIKE',"%{$request->search}%")
                            ->orWhere('description','LIKE',"%{$request->search}%")
                            ->get();

        return response()->json(['success' => true,'data' => $events]);
    }

    public function destroy($congregation, $id)
    {
        $id_congregation = auth()->user()->congregation->id;

        if ($id_congregation != $congregation)
            return response()->json(['success' => false,'message' => 'Congregation not found'], 400);

        $event = auth()->user()->congregation->events()->find($id);

        if (!$event)
            return response()->json(['success' => false,'message' => 'Event not found'], 400);

        if(!$event->delete())
            return response()->json(['success' => false,'message' => 'Event could not be deleted']);

        return response()->json(['success' => true]);        
    }
}
