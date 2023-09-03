<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $regions = Region::auth()->get();
        $stores = Store::auth()
            ->get();

        $stores = $stores->map(function($store) {
            $store['amount'] = $store->sales->sum('amount');
            return $store;
        });

        return view('dashboard.dashboard',
            [
                'user'    => $user,
                'regions' => $regions,
                'stores'  => $stores,
            ]
        );
    }
}
