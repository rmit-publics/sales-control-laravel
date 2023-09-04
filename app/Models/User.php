<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function getSellers(int $store_id) {
        return $this->where('store_id', $store_id)->where('access', 'S')->get();
    }

    public function getMenagers() {
        $user = Auth::user();
        $managers = Store::when($user->access === 'RD', function($rd) use($user) {
            $regionManager = RegionManager::where('user_id', $user->id)->first();
            $rd->where('region_id', $regionManager->region_id);
        })
        ->when($user->access === 'M', function($rd) use($user) {
            $rd->where('manager_id', $user->id);
        })
        ->when($user->access === 'S', function($rd) use($user) {
            $rd->where('id', '-1');
        })
        ->select('manager_id')->get();

        return $this->whereIn('id', $managers)->where('access', 'M')->get();
    }

    public function seller() {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }

    public function regionManager() {
        return $this->hasOne(RegionManager::class, 'user_id', 'id');
    }

}