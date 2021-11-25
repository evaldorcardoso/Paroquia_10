<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index($congregation)
    {
        $events = Event::where('congregation_id', $congregation)->get();

        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }

    public function show($congregation, $id)
    {
        $event = Event::where('congregation_id', $congregation)->find($id);

        if($event) 
            return response()->json([
                'success' => true,
                'data' => $event
            ]);

        return response()->json([
            'success' => false,
            'message' => 'Event not found'
        ]);
    }

    public function store(Request $request, $congregation)
    {
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'event_at' => 'required',
            'address' => 'required|string|max:200'        
        ]);

        $data_congregation = auth()->user()->congregations()->find($request->congregation);

        if (!$data_congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation not found'
            ], 400);
        }
        $data = $request->all();        

        // $data['event_at'] = date('Y-m-d H:i:s', strtotime($request->event_at));
        $data['event_at']=$data['event_at_d'].' '.$data['event_at_h'];
        unset($data['event_at_d']);
        unset($data['event_at_h']);
        $data['congregation_id'] = $data_congregation->id;

        Event::create($data);
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function update(Request $request, $congregation, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'event_at' => 'required',
            'address' => 'required|string|max:200'        
        ]);

        $data_congregation = auth()->user()->congregations()->find($request->congregation);

        if (!$data_congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation not found'
            ], 400);
        }

        $data = $request->only('title', 'event_at', 'address', 'description', 'readings');

        Event::where('congregation_id', $data_congregation->id)
            ->where('id', $id)
            ->update($data);
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function search(Request $request){
        // $filters = $request->except('_token');
        $events = Event::where('title','LIKE',"%{$request->search}%")
                            ->orWhere('description','LIKE',"%{$request->search}%")
                            ->get();
        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }

    public function destroy($congregation, $id)
    {
        $data_congregation = auth()->user()->congregations()->find($congregation);

        if (!$data_congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation not found'
            ], 400);
        }

        $event = Event::where('congregation_id', $data_congregation->id)
            ->where('id', $id)
            ->first();

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 400);
        }

        if($event->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Event could not be deleted'
            ]);
        }
    }
}
