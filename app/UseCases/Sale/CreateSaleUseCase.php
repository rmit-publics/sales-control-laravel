<?php

namespace App\UseCases\Sale;

use App\Models\Sale;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CreateSaleUseCase {
    public function execute(Request $request) {
        $this->rules($request);

        try {
            Sale::create([
                "seller_id"  => Auth::user()->id,
                "product_id" => $request->input("product_id"),
                "quantity"   => $request->input("quantity"),
                "lat"        => $request->input("lat"),
                "lng"        => $request->input("lng"),
            ]);

            return redirect()->back()->with('status', 'Sale create with success');
        }catch(Exception $e) {
            Log::error([
                "error"=>$e->getMessage()
            ]);
            return redirect()->back()->with('status', 'Error to create sale');
        }
    }


    private function rules(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'quantity'   => 'required',
            'lat'        => 'required',
            'lng'        => 'required',
        ]);
    }
}