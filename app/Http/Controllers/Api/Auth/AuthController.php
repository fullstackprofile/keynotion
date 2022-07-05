<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function storeLogin(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        //$credentials['role'] = 'user';

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('web');
            return response()->json(['token' => $token->plainTextToken]);
        } else {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }

    public function storeRegister()
    {

    }
}
