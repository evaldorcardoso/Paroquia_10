<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Mail\RegisterMail;
use App\Models\UserToken;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Register a new user
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function register(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $userToken = UserToken::create([
            'user_id' => $user->id,
            'token' => md5(uniqid(rand(), true))
        ]);

        $details = [
            'title' => 'Agora só falta ativar a sua conta no App Paróquia 10!',
            'name' => $user->name,
            'body' => 'Clique no botão abaixo para ativar a sua conta e tenha acesso ao 
                cadastro de congregações e muito mais:',
            'url' => config('app.url').'/api/public/user/'.$user->id.'/activate/'.$userToken->token
        ];
        Mail::to($user)->send(new RegisterMail($details));

        return response()->json(['success' => true,'data' => $user], Response::HTTP_CREATED);
    }

    /**
     * Verify and issue a new token for the user
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->where('active', 1)->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'user' => 'The provided credentials are incorrect.'
            ]);
        }

        $user->tokens()->delete();

        return response()->json([
            'token' => $user->createToken($data['device_name'])->plainTextToken
        ]);
    }

    /**
     * Return the authenticated user
     *
     * @return JsonResponse
     */
    public function show()
    {
        return response()->json(auth()->user());
    }
}
