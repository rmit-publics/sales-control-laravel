<?php

namespace App\UseCases\Sale;

use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CreateSaleWebUseCase {

    private $createSaleUseCase;
    public function __construct() {
        $this->createSaleUseCase = new CreateSaleUseCase();
    }

    public function execute(SaleRequest $request) {
        $response = $this->createSaleUseCase->execute($request);

        if($response) {
            return redirect()->back()->with('status', 'Sale create with success');
        } else {
            return redirect()->back()->with('status', 'Error to create sale');
        }
    }
}