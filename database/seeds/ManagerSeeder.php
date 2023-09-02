<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            [
            "name"     => "Ronaldinho Gaucho",
            "email"    => "ronaldinho.gaucho@magazineaziul.com.br",
            "access"   => "M",
            "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Roberto Firmino",
                "email"    => "roberto.firmino@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Alex de Souza",
                "email"    => "alex.de.souza@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Françoaldo Souza",
                "email"    => "françoaldo.souza@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Romário Faria",
                "email"    => "romário.faria@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Ricardo Goulart",
                "email"    => "ricardo.goulart@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Dejan Petkovic",
                "email"    => "dejan.petkovic@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Deyverson Acosta",
                "email"    => "deyverson.acosta@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Harlei Silva",
                "email"    => "harlei.silva@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ],
            [
                "name"     => "Walter Henrique",
                "email"    => "walter.henrique@magazineaziul.com.br",
                "access"   => "M",
                "password" => Hash::make("123mudar")
            ]
        ];
        User::insert($users);

    }
}
