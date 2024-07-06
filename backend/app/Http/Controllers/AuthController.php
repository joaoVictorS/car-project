<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
  public function login(Request $request)
  {
      $credentials = $request->only('email', 'password');
      Log::info('Credenciais recebidas: ', $credentials);
      
      if (! $token = Auth::guard('api')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
          Log::error('Falha na autenticação: Credenciais inválidas');
          return response()->json(['error' => 'Unauthorized'], 401);
      }
  
      Log::info('Autenticação bem-sucedida');
      return $this->respondWithToken($token);
  }
  

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
