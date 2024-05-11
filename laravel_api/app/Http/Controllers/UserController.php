<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function update(UserRequest $request, $id)
    {
        $user = User::find(auth()->user()->id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'user with id ' . $id . ' not found'
            ], 400);
        }
        
        $user = $user->update($request->except('email'));
            
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User could not be updated'
            ], 500);
        }
            
        return response()->json(['success' => true]);        
    }
}
