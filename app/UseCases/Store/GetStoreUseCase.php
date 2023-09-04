<?php
namespace App\UseCases\Store;

use App\Models\Store;

class GetStoreUseCase {
    public function execute(int $region_id) {
        return Store::where('region_id', $region_id)->get();
    }
}