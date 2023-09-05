<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\UseCases\Sale\Api\CreateSaleApiUseCase;

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

    public function create(SaleRequest $request) {
        return $this->createSaleApiUseCase->execute($request);
    }

    public function show(Sale $sale)
    {
        return $sale;
    }
}
