<?php

use App\Models\Region;
use App\Models\RegionManager;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RegionalDirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function getRegion(string $name) {
        $region = Region::where('name', $name)->first();
        return $region->id;
    }

    public function getUser(string $name) {
        $user = User::where("name", $name)->first();
        return $user->id;
    }

    public function run()
    {
        $users = [
            [
                "name"     => "Vagner Mancini",
                "email"    => "vagner.mancini@magazineaziul.com.br",
                "access"   => "RD",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Abel Ferreira",
                "email"    => "abel.ferreira@magazineaziul.com.br",
                "access"   => "RD",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Rogerio Ceni",
                "email"    => "rogerio.ceni@magazineaziul.com.br",
                "access"   => "RD",
                "password" => Hash::make("123mudar")
            ]
        ];
        User::insert($users);

        $regionUsers = [
            [
                "region_id" => $this->getRegion('Sul'),
                "user_id"   => $this->getUser('Vagner Mancini')
            ],
            [
                "region_id" => $this->getRegion('Sudeste'),
                "user_id"   => $this->getUser('Abel Ferreira')
            ],
            [
                "region_id" => $this->getRegion('Centro-oeste'),
                "user_id"   => $this->getUser('Rogerio Ceni')
            ],
        ];

        RegionManager::insert($regionUsers);
    }
}
