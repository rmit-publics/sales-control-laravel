<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sale extends Model
{
    protected $fillable = [
        'seller_id',
        'product_id',
        'quantity',
        'lat',
        'lng',
        'roming',
    ];

    public function scopeAuth(Builder $query): void
    {
        $user = Auth::user();
        if($user->access !== 'GD') {
            if($user->access ==='RD') {
                $regionManager = RegionManager::where('user_id', $user->id)->first();
                $stores = Store::where('region_id', $regionManager->region_id)->select('id')->get();
                $sellers = User::whereIn('store_id', $stores)->orderBy('id')->get();
                $query->whereIn('seller_id', $sellers);
            }

            if($user->access ==='M') {
                $store = Store::where('manager_id', $user->id)->select('id')->first();
                $sellers = User::where('store_id', $store->id)->select('id')->get();
                $query->whereIn('seller_id', $sellers);
            }

            if($user->access === 'S') {
                $query->where('seller_id', $user->id);
            }
        }
    }

    public function SaleSeller() {
        return $this->hasOne(User::class, 'id', 'seller_id');
    }
}
