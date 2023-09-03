<?php
namespace App\UseCases\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetSellerUseCase {
    public function execute(int $store_id) {
        $user =  new User();
        return $user->getSellers($store_id);
    }
}