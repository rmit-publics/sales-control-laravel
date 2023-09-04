<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\UseCases\User\GetSellerUseCase;
use Illuminate\Http\Request;
use App\UseCases\User\LoginUseCase;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $loginUseCase;
    private $getSellerUseCase;
    public function __construct() {
        $this->loginUseCase = new LoginUseCase();
        $this->getSellerUseCase = new GetSellerUseCase();
    }

    public function login() {
        return view('login.login');
    }

    public function authenticate(Request $request) {
        return $this->loginUseCase->execute($request);
    }

    public function getSeller(int $store_id) {
        return $this->getSellerUseCase->execute($store_id);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
