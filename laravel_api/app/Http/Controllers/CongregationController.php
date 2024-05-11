<?php

namespace App\Http\Controllers;

use App\Http\Requests\CongregationRequest;
use App\Models\Congregation;

class CongregationController extends Controller
{
    public function index()
    {
        $congregations = auth()->user()->congregations;

        return response()->json(['success' => true,'data' => $congregations]);
    }

    public function show($id)
    {
        $congregation = auth()->user()->congregation;

        if (!$congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation with id ' . $id . ' not found'
            ], 400);
        }

        return response()->json(['success' => true,'data' => $congregation->toArray()], 200);
    }

    public function store(CongregationRequest $request)
    {
        $congregation = auth()->user()->congregation->save($request->validated());
        if(!$congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be added'
            ], 500);
        }
                    
        return response()->json(['success' => true,'data' => $congregation]);
    }

    public function update(CongregationRequest $request, $id)
    {
        $id_congregation = auth()->user()->congregation->id;

        if ($id_congregation != $id) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation with id ' . $id . ' not found'
            ], 400);
        }    

        $congregation = auth()->user()->congregation->update($request->validated());        
        
        if (!$congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be updated'
            ], 500);
        }
                    
        return response()->json(['success' => true]);        
    }

    public function destroy($id)
    {
        $id_congregation = auth()->user()->congregation->id;

        if ($id_congregation != $id) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation with id ' . $id . ' not found'
            ], 400);
        }

        if (!auth()->user()->congregation->delete()) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be deleted'
            ], 500);
        }
        
        return response()->json(['success' => true]);        
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

        return response()->json(['success' => true,'data' => $congregation->toArray()], 200);
    }
    
    public function getAll()
    {
        //get all active congregations
        $congregations = Congregation::where('active', 1)->get();

        return response()->json(['success' => true,'data' => $congregations]);
    }        
}
