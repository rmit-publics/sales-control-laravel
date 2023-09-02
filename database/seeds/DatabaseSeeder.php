<?php

use App\Models\Region;
use App\Models\RegionManager;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Region::truncate();
        Store::truncate();
        RegionManager::truncate();
        $this->call([
            GeneralDirectorSeeder::class,
            RegionSeeder::class,
            RegionalDirectorSeeder::class,
            ManagerSeeder::class,
            StoreSeeder::class,
            UserSeeder::class
        ]);
    }
}
