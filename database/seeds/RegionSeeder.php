<?php

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                "name" => "Sul",
            ],
            [
                "name" => "Sudeste",
            ],
            [
                "name" => "Centro-oeste",
            ],
        ];

        Region::insert($regions);
    }
}
