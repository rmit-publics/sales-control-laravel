<?php

use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Seeder;

class RegionManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function getUser(string $name) {
        $user = User::where("name", $name)->first();
        return $user->id;
    }

    public function getRegion(string $name) {
        $region = Region::where("name", $name)->first();
        return $region->id;
    }

    public function run()
    {
        return [
            [
                "user_id"   => $this->getUser("Vagner Mancini"),
                "region_id" => $this->getRegion("Sul"),
            ],
            [
                "user_id"   => $this->getUser("Abel Ferreira"),
                "region_id" => $this->getRegion("Sudeste"),
            ],
            [
                "user_id"   => $this->getUser("Rogerio Ceni"),
                "region_id" => $this->getRegion("Centro-oeste"),
            ],
        ];
    }
}
