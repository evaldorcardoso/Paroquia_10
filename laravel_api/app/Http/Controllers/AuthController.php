<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
                'email' => 'The provided credentials are incorrect.',
                'password' => 'The provided credentials are incorrect.'
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
