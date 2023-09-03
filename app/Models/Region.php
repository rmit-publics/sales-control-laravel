<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Region extends Model
{
    protected $fillable = [
        'name',
    ];

    public function scopeAuth(Builder $query): void
    {
        $user = Auth::user();
        if($user->access !== 'GD') {
            if($user->access ==='RD') {
                $regionManager = RegionManager::where('user_id', $user->id)->first();
                $query->where('id', $regionManager->region_id);
            } else {
                $query->where('id', '-1');
            }
        }
    }
}
