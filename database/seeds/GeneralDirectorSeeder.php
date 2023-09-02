<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GeneralDirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            "name"     => "Edson A. do Nascimento",
            "email"    => "pele@magazineaziul.com.br",
            "access"   => "GD",
            "password" => Hash::make("123mudar")
        ]);
    }
}
