<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AuthLoginResource;
use App\Http\Resources\AuthLogoutResource;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        // Tentare l'autenticazione con il guard 'web' (users)
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            $accessToken = $user->createToken($user->email)->accessToken;
            return new AuthLoginResource($user, $accessToken);
        }

        // Tentare l'autenticazione manuale per il guard 'api' (companies)
        $company = \App\Models\CompanyModel::where('email', $credentials['email'])->first();
        if ($company && \Hash::check($credentials['password'], $company->password)) {
            $accessToken = $company->createToken($company->email)->accessToken;
            return new AuthLoginResource($company, $accessToken);
        }

        // Se nessuno dei due tentativi ha successo, ritorna un errore
        return response()->json(['message' => 'Invalid login details'], 401);
    }

    public function logout(LogoutRequest $request)
    {
        $guard = $request->input('guard', 'web'); // Default to 'web' guard
        $user = Auth::guard($guard)->user();
        $user->token()->revoke();

        return new AuthLogoutResource(null);
    }
}
