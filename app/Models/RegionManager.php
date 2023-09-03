<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionManager extends Model
{
    protected $fillable = [
        'region_id',
        'user_id',
    ];
}
