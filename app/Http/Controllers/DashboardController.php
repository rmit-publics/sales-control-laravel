<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $regions = Region::auth()->get();
        $stores = Store::auth()
            ->get();

        if($user->access !== 'GD' && $user->access !== 'RD') {
            return redirect('sales');
        }

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

    public function search(Request $request)
    {
        $user = Auth::user();
        $regions = Region::auth()->get();
        $stores = Store::auth()
            ->when($request->input("region_id") != null, function($query) use ($request) {
                $query->where('region_id', $request->input('region_id'));
            })
            ->when($request->input('store_id') != 0,  function($query) use ($request) {
                $query->where('id', $request->input('store_id'));
            })
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
