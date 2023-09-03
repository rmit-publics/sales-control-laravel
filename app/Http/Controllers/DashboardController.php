<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $regions = Region::auth()->get();
        $stores = Store::auth()->get();
        return view('dashboard.dashboard',
            [
                'user' => $user,
                'regions' => $regions,
                'stores' => $stores,
            ]
        );
    }
}
