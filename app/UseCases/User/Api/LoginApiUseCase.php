<?php

namespace App\UseCases\User\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginApiUseCase {

    public function execute(Request $request) {
        $credentials = collect($request)->toArray();
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
            die();
        }

        if(Auth::guard('api')->user()->access !== "S") {
            return response()->json(['message' => 'The mobile version is only for sellers'], 403);
        }

        $user = $this->getUser();
        if( isset($user->active) && (bool)$user->active === false) {
            return response()->json(['message' => 'Client not active'], 403);
            die();
        }

        return $this->respondWithToken($token);
    }

    protected function getUser(){
        return Auth::guard('api')->user();
    }

    protected function getName(){
        $data = $this->getUser();
        return $data->name;
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->getUser(),
            'token_type' => 'bearer',
        ]);
    }

}