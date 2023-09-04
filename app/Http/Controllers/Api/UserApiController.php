<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UseCases\User\Api\LoginApiUseCase;

class UserApiController extends Controller
{
    private $loginUseCase;
    public function __construct() {
        $this->loginUseCase = new LoginApiUseCase();
    }

    public function login(Request $request) {
        return $this->loginUseCase->execute($request);
    }
}
