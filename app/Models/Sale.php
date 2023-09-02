<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
