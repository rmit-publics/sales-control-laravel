<?php

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
    }
}
