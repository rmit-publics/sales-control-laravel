<?php

namespace App\UseCases\Sale\Api;

use Illuminate\Http\Request;
use App\UseCases\Sale\CreateSaleUseCase;


class CreateSaleApiUseCase {

    private $createSaleUseCase;
    public function __construct() {
        $this->createSaleUseCase = new CreateSaleUseCase();
    }

    public function execute(Request $request) {
        $response = $this->createSaleUseCase->execute($request);

        if($response) {
            return response()->json(['message' => 'Sale create with success'], 201);
        } else {
            return response()->json(['message' => 'Error to create sale'], 403);
        }
    }
}