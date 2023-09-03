<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function storeRegion() {
        return $this->hasOne(Region::class, 'region_id', 'id');
    }

    public function sales() {
        return $this->hasMany(Sale::class, 'store_id', 'id');
    }

    public function getDistanceStores($lat, $lng) {
        $stores = DB::select('select * from (
            select
            s.id,
            ST_DISTANCE_SPHERE(
                    POINT(s.lat , s.lng),
                    POINT('.$lat.', '.$lng.')
                ) AS distancia
            from stores s
        ) x
        order by x.distancia');

        return $stores[0];
    }
}
