<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserToken;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserTokenController extends Controller
{
    public function create(Request $request){
        $userId = $request->user_id;
        $user = User::find($userId);
        if(!$user){
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        $lastToken = UserToken::where('user_id', $userId)->orderBy('created_at', 'desc')->first();
        if($lastToken){
            //retorno token existente
            if($lastToken->used == 0){
                $details = [
                    'title' => 'Agora só falta ativar a sua conta no App Paróquia 10!',
                    'name' => $user->name,
                    'body' => 'Clique no botão abaixo para ativar a sua conta e tenha acesso ao cadastro de congregações e muito mais:',
                    'url' => config('app.url').'/api/public/user/'.$userId.'/activate/'.$lastToken->token
                ];
                Mail::to($user)->send(new RegisterMail($details));

                return response()->json([
                    'message' => 'Token sent',
                    'token' => $lastToken->token
                ], 200);
            }
            if($lastToken->created_at->diffInHours() > 2){
                //crio novo token
                $token = UserToken::create([
                    'user_id' => $userId,
                    'token' => md5(uniqid(rand(), true))
                ]);

            }
            else{
                return response()->json([
                    'message' => 'Too many tokens in interval, wait at least 2 hours'
                ], 400);
            }
        }else{
            //crio novo token
            $token = UserToken::create([
                'user_id' => $userId,
                'token' => md5(uniqid(rand(), true))
            ]);
        }

        $details = [
            'title' => 'Agora só falta ativar a sua conta no App Paróquia 10!',
            'name' => $user->name,
            'body' => 'Clique no botão abaixo para ativar a sua conta e tenha acesso ao cadastro de congregações e muito mais:',
            'url' => env('APP_URL').'/api/user/'.$userId.'/activate/'.$token->token
        ];
        Mail::to($user->email)->send(new \App\Mail\RegisterMail($details));

        return response()->json([
            'message' => 'Token created',
            'token' => $token->token
        ], 201);
    }

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

    public function activate($user, $token){
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
            // return response()->json([
            //     'error' => 'Token inválido, tente se registrar novamente!'
            // ], 401);
        }
        if($tokenToUse->used == 1){
            return view('advice', [
                'details' => ['message' => 'Esta conta já foi ativada!']
            ]);
            // return response()->json([
            //     'error' => 'Token already used'
            // ], 401);
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
        // return response()->json([
        //     'message' => 'User activated'
        // ], 200);
    }
}
