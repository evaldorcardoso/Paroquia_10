<?php

namespace App\Http\Controllers;

use App\Models\Congregation;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'description' => 'string',
            'address' => 'string|max:200',
            'pastor' => 'string|max:100',
            'lat' => 'numeric',
            'lon' => 'numeric',
            'image' => 'string'
        ]);

        $congregation = new Congregation();
        $congregation->name = $request->name;
        $congregation->description = $request->description;
        $congregation->address = $request->address;
        $congregation->pastor = $request->pastor;
        $congregation->lat = $request->lat;
        $congregation->lon = $request->lon;
        $congregation->image = $request->image;

        if(auth()->user()->congregations()->save($congregation))
            return response()->json([
                'success' => true,
                'data' => $congregation->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be added'
            ], 500);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string|max:191',
            'address' => 'string|max:200',
            'pastor' => 'string|max:100',
            'lat' => 'numeric',
            'lon' => 'numeric'
        ]);

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
    
        
}
