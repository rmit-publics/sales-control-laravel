<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    protected $fillable = [
        'name',
        'email',
        'region_id',
        'manager_id',
        'lat',
        'lng',
    ];

    public function scopeAuth(Builder $query): void
    {
        $user = Auth::user();
        if($user->access !== 'GD') {
            if($user->access ==='RD') {
                $regionManager = RegionManager::where('user_id', $user->id)->first();
                $query->where('region_id', $regionManager->region_id);
            }

            if($user->access ==='M') {
                $query->where('manager_id', $user->id);
            }

            if($user->access === 'S') {
                $query->where('id', $user->store_id);
            }
        }
    }

    public function StoreRegion() {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
