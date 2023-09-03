<?php

namespace App\UseCases\Sale;

use App\Models\Sale;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CreateSaleUseCase {
    public function execute(Request $request) {
        $this->rules($request);
        $roming = $this->isRoming($request);

        try {
            Sale::create([
                "seller_id"      => Auth::user()->id,
                "store_id"       => Auth::user()->store_id,
                "close_store_id" => $roming->id !== Auth::user()->store_id ? $roming->id : null,
                "product"        => $request->input("product"),
                "quantity"       => $request->input("quantity"),
                "lat"            => $request->input("lat"),
                "lng"            => $request->input("lng"),
                "roming"         => $roming->id !== Auth::user()->store_id
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
            'product'    => 'required',
            'quantity'   => 'required',
            'lat'        => 'required',
            'lng'        => 'required',
        ]);
    }

    private function isRoming(Request $request) {
        $store = new Store();
        $closeStore = $store->getDistanceStores($request->input('lat'), $request->input('lng'));

        return $closeStore;
    }
}