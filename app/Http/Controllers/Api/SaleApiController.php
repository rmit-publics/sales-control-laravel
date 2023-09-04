<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\UseCases\Sale\Api\CreateSaleApiUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleApiController extends Controller
{

    private $createSaleApiUseCase;

    public function __construct() {
        $this->createSaleApiUseCase = new CreateSaleApiUseCase();
    }

    public function sales() {
        $sales = Sale::where('seller_id', Auth::user()->id)->get();
        return $sales;
    }

    public function create(Request $request) {
        return $this->createSaleApiUseCase->execute($request);
    }
}
