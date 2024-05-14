<?php

namespace App\Http\Controllers;

use App\Http\Requests\CongregationRequest;
use App\Models\Congregation;
use Symfony\Component\HttpFoundation\Response;

class CongregationController extends Controller
{
    public function show()
    {
        $congregation = auth()->user()->congregation;

        if (!$congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation not found'
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['success' => true,'data' => $congregation]);
    }

    public function store(CongregationRequest $request)
    {
        /**
         * @var User $user
         */
        $user = auth()->user();
        $congregation = $user->congregation()->create($request->validated());
        if(! $congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be added'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
                    
        return response()->json(['success' => true,'data' => $congregation], Response::HTTP_CREATED);
    }

    public function update(CongregationRequest $request)
    {
        $congregation = auth()->user()->congregation->id;

        if (! $congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation not found'
            ], Response::HTTP_NOT_FOUND);
        }    

        $congregation = auth()->user()->congregation->update($request->validated());        
        
        if (! $congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be updated'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
                    
        return response()->json(['success' => true]);
    }

    public function destroy()
    {
        $congregation = auth()->user()->congregation;

        if (! $congregation) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation not found'
            ], Response::HTTP_NOT_FOUND);
        }

        if (! auth()->user()->congregation->delete()) {
            return response()->json([
                'success' => false,
                'message' => 'Congregation could not be deleted'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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
