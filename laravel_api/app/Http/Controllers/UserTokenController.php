<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserToken;
use App\Models\User;

class UserTokenController extends Controller
{
    public function verify(Request $request){
        $userId = $request->user_id;
        $token = $request->token;
        $userToken = UserToken::where('user_id', $userId)->where('token', $token)->first();
        if(!$userToken){
            return response()->json([
                'error' => 'Token invalid'
            ], 401);
        }
        if($userToken->used == 1){
            return response()->json([
                'error' => 'Token already used'
            ], 401);
        }
        if($userToken->created_at->diffInHours() > 2){
            return response()->json([
                'error' => 'Token expired'
            ], 401);
        }
        return response()->json([
            'message' => 'Token valid'
        ], 200);
    }

    public function activate(string $user, string $token){
        $userToActivate = User::find($user);
        if(!$userToActivate){
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }
        $tokenToUse = UserToken::where('user_id', $userToActivate->id)->where('token', $token)->first();
        if(!$tokenToUse){
            return view('advice', [
                'details' => ['message' => 'Token inválido, tente se registrar novamente!']
            ]);
        }
        if($tokenToUse->used == 1){
            return view('advice', [
                'details' => ['message' => 'Esta conta já foi ativada!']
            ]);
        }
        if($userToActivate->active == 0){
            $userToActivate->active = 1;
            $userToActivate->save();
        }
        $tokenToUse->used = 1;
        $tokenToUse->save();
        return view('advice', [
            'details' => ['message' => 'Conta ativada com sucesso!']
        ]);
    }
}
