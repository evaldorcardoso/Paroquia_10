<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserToken;
use Illuminate\Http\Request;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // $token = $user->createToken('LaravelAuthApp')->accessToken;

        // return response()->json(['token' => $token], 200);
        return response()->json(['success' => true,'data' => $user], 201);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        
        
        if (auth()->attempt($data)) {
            if(auth()->user()->active>0){
                $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                return response()->json(array_merge((array) auth()->user()->getAttributes(), ['token' => $token]), 200);
            }
            return response()->json(['message' => 'Usuário inativo'], 401);            
        } 
        return response()->json(['message' => 'Login e/ou senha inválidos'], 401);        
    }

    /**
     * Get user logged
     */
    public function show(){
        return response()->json(auth()->user(), 200);
    }
}
