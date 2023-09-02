<?php

use App\Models\Store;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function getStore(string $name) {
        $store = Store::where("name", $name)->first();
        return $store->id;
    }

    public function run()
    {
        $sallers = [
            [
            "name"     => "Afonso Afancar",
            "email"    => "afonso.afancar@magazineaziul.com.br",
            "access"   => "S",
            "store_id" => $this->getStore("Belo Horizonte"),
            "password" => "123mudar"
            ],
            [
                "name"     => "Alceu Andreoli",
                "email"    => "alceu.andreoli@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Belo Horizonte"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Amalia Zago",
                "email"    => "amalia.zago@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Belo Horizonte"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Carlos Eduardo",
                "email"    => "carlos.eduardo@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Belo Horizonte"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Luiz Felipe",
                "email"    => "luiz.felipe@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Belo Horizonte"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Breno",
                "email"    => "breno@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Campo Grande"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Emanuel",
                "email"    => "emanuel@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Campo Grande"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Ryan",
                "email"    => "ryan@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Campo Grande"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Vitor Hugo",
                "email"    => "vitor.hugo@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Campo Grande"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Yuri",
                "email"    => "yuri@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Campo Grande"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Benjamin",
                "email"    => "benjamin@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Cuiaba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Erick",
                "email"    => "erick@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Cuiaba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Enzo Gabriel",
                "email"    => "enzo.gabriel@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Cuiaba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Enzo Gabriel",
                "email"    => "enzo.gabriel@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Cuiaba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Fernando",
                "email"    => "fernando@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Cuiaba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Joaquim",
                "email"    => "joaquim@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Cuiaba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "André",
                "email"    => "andré@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Curitiba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Raul",
                "email"    => "raul@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Curitiba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Marcelo",
                "email"    => "marcelo@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Curitiba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Julio César",
                "email"    => "julio.césar@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Curitiba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Cauê",
                "email"    => "cauê@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Curitiba"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Benício",
                "email"    => "benício@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Florianopolis"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Vitor Gabriel",
                "email"    => "vitor.gabriel@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Florianopolis"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Augusto",
                "email"    => "augusto@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Florianopolis"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Pedro Lucas",
                "email"    => "pedro.lucas@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Florianopolis"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Luiz Gustavo",
                "email"    => "luiz.gustavo@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Florianopolis"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Giovanni",
                "email"    => "giovanni@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Goiania"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Renato",
                "email"    => "renato@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Goiania"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Diego",
                "email"    => "diego@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Goiania"),
                "password" => "123mudar"
            ],
            [
                "name"     => "João Paulo",
                "email"    => "joão.paulo@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Goiania"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Renan",
                "email"    => "renan@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Goiania"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Luiz Fernando",
                "email"    => "luiz.fernando@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Porto Alegre"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Anthony",
                "email"    => "anthony@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Porto Alegre"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Lucas Gabriel",
                "email"    => "lucas.gabriel@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Porto Alegre"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Thales",
                "email"    => "thales@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Porto Alegre"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Luiz Miguel",
                "email"    => "luiz.miguel@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Porto Alegre"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Henry",
                "email"    => "henry@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Rio de Janeiro"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Marcos Vinicius",
                "email"    => "marcos.vinicius@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Rio de Janeiro"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Kevin",
                "email"    => "kevin@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Rio de Janeiro"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Levi",
                "email"    => "levi@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Rio de Janeiro"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Enrico",
                "email"    => "enrico@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Rio de Janeiro"),
                "password" => "123mudar"
            ],
            [
                "name"     => "João Lucas",
                "email"    => "joão.lucas@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Sao Paulo"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Hugo",
                "email"    => "hugo@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Sao Paulo"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Luiz Guilherme",
                "email"    => "luiz.guilherme@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Sao Paulo"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Matheus Henrique",
                "email"    => "matheus.henrique@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Sao Paulo"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Miguel",
                "email"    => "miguel@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Sao Paulo"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Davi",
                "email"    => "davi@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Vitória"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Gabriel",
                "email"    => "gabriel@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Vitória"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Arthur",
                "email"    => "arthur@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Vitória"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Lucas",
                "email"    => "lucas@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Vitória"),
                "password" => "123mudar"
            ],
            [
                "name"     => "Matheus",
                "email"    => "matheus@magazineaziul.com.br",
                "access"   => "S",
                "store_id" => $this->getStore("Vitória"),
                "password" => "123mudar"
            ]
        ];

        $GeneralDirector = [
            [
                "name"     => "Edson A. do Nascimento",
                "email"    => "pele@magazineaziul.com.br",
                "access"   => "GD",
                "password" => "123mudar"
            ]
        ];

        $RegionDirector = [
            [
                "name"     => "Vagner Mancini",
                "email"    => "pele@magazineaziul.com.br",
                "access"   => "RD",
                "password" => "123mudar"
            ],
            [
                "name"     => "Abel Ferreira",
                "email"    => "abel.ferreira@magazineaziul.com.br",
                "access"   => "RD",
                "password" => "123mudar"
            ],
            [
                "name"     => "Rogerio Ceni",
                "email"    => "rogerio.ceni@magazineaziul.com.br",
                "access"   => "RD",
                "password" => "123mudar"
            ],
        ];

        $Manager = [
            [
                "name"     => "Ronaldinho Gaucho",
                "email"    => "ronaldinho.gaucho@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Roberto Firmino",
                "email"    => "roberto.firmino@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Alex de Souza",
                "email"    => "alex.de.souza@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Françoaldo Souza",
                "email"    => "françoaldo.souza@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Romário Faria",
                "email"    => "romário.faria@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Ricardo Goulart",
                "email"    => "ricardo.goulart@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Dejan Petkovic",
                "email"    => "dejan.petkovic@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Deyverson Acosta",
                "email"    => "deyverson.acosta@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Harlei Silva",
                "email"    => "harlei.silva@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
            [
                "name"     => "Walter Henrique",
                "email"    => "walter.henrique@magazineaziul.com.br",
                "access"   => "M",
                "password" => "123mudar"
            ],
        ];


        $users = array_merge($sallers,$GeneralDirector, $RegionDirector, $Manager);

        return[
            $users
        ];
    }
}
