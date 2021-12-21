<?php

namespace App\Http\Controllers;

use App\Http\Requests\CongregationRequest;
use App\Models\Congregation;

class CongregationController extends Controller
{
    public function index()
    {
        $congregations = auth()->user()->congregations;

        return response()->json([
            'success' => true,
            'data' => $congregations
        ]);
    }

    public function show($id)
    {
        $congregation = auth()->user()->congregations()->find($id);

        if (!$congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation with id ' . $id . ' not found'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $congregation->toArray()
        ], 200);
    }

    public function store(CongregationRequest $request)
    {
        $congregation = $request->all();

        if(auth()->user()->congregations()->save($congregation))
            return response()->json([
                'success' => true,
                'data' => $congregation
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be added'
            ], 500);
    }

    public function update(CongregationRequest $request, $id)
    {
        $congregation = auth()->user()->congregations()->find($id);

        if (!$congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation with id ' . $id . ' not found'
            ], 400);
        }

        // $updated = $congregation->fill($request->all())->save();
        
        $congregation->name = $request->name;
        $congregation->address = $request->address;
        $congregation->pastor = $request->pastor;
        $congregation->lat = $request->lat;
        $congregation->lon = $request->lon;
        $congregation->image = $request->image;
        $congregation->active = $request->active;
        
        if ($congregation->save()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be updated'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $congregation = auth()->user()->congregations()->find($id);

        if (!$congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation with id ' . $id . ' not found'
            ], 400);
        }

        if ($congregation->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be deleted'
            ], 500);
        }
    }

    //Public routes
    public function publicShow($id)
    {
        $congregation = Congregation::find($id);

        if (!$congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation with id ' . $id . ' not found'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $congregation->toArray()
        ], 200);
    }
    
    public function getAll()
    {
        //get all active congregations
        $congregations = Congregation::where('active', 1)->get();

        return response()->json([
            'success' => true,
            'data' => $congregations
        ]);
    }        
}
