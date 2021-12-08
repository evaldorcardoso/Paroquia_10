<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string|max:100',
            'active' => 'boolean'            
        ]);

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'user with id ' . $id . ' not found'
            ], 400);
        }

        // $updated = $user->fill($request->all())->save();
        
        $user->name = $request->name;
        // $user->email = $request->email;//não pode alterar o email        
        $user->active = $request->active;
        
        if ($user->save()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User could not be updated'
            ], 500);
        }
    }
}
