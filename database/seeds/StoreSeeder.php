<?php

use App\Models\Region;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function getRegion(string $name) {
        $region = Region::where("name", $name)->first();
        return $region->id;
    }

    public function getUser(string $name) {
        $user = User::where("name", $name)->first();
        return $user->id;
    }

    public function run()
    {
        $stores = [
            [
                "name"       => "Porto Alegre",
                "email"      => "ronaldinho.gaucho@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Sul"),
                "manager_id" => $this->getUser("Ronaldinho Gaucho"),
                "lat"        => -30.048750057541955,
                "lng"        => -51.228587422990806,
            ],
            [
                "name"       => "Florianopolis",
                "email"      => "roberto.firmino@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Sul"),
                "manager_id" => $this->getUser("Roberto Firmino"),
                "lat"        => -27.55393525017396,
                "lng"        => -48.49841515885026,
            ],
            [
                "name"       => "Curitiba",
                "email"      => "alex.de.souza@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Sul"),
                "manager_id" => $this->getUser("Alex de Souza"),
                "lat"        => -27.55393525017396,
                "lng"        => -48.49841515885026,
            ],
            [
                "name"       => "Sao Paulo",
                "email"      => "françoaldo.souza@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Sudeste"),
                "manager_id" => $this->getUser("Françoaldo Souza"),
                "lat"        => -23.544259437612844,
                "lng"        => -46.64370714029131,
            ],
            [
                "name"       => "Rio de Janeiro",
                "email"      => "romário.faria@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Sudeste"),
                "manager_id" => $this->getUser("Romário Faria"),
                "lat"        => -22.923447510604802,
                "lng"        => -43.23208495438858,
            ],
            [
                "name"       => "Belo Horizonte",
                "email"      => "ricardo.goulart@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Sudeste"),
                "manager_id" => $this->getUser("Ricardo Goulart"),
                "lat"        => -19.917854829716372,
                "lng"        => -43.94089385954766,
            ],
            [
                "name"       => "Vitória",
                "email"      => "dejan.petkovic@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Sudeste"),
                "manager_id" => $this->getUser("Dejan Petkovic"),
                "lat"        => -20.340992420772206,
                "lng"        => -40.38332271475097,
            ],
            [
                "name"       => "Campo Grande",
                "email"      => "deyverson.acosta@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Centro-oeste"),
                "manager_id" => $this->getUser("Deyverson Acosta"),
                "lat"        => -20.462652006300377,
                "lng"        => -54.615658937666645,
            ],
            [
                "name"       => "Goiania",
                "email"      => "harlei.silva@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Centro-oeste"),
                "manager_id" => $this->getUser("Harlei Silva"),
                "lat"        => -16.673126240814387,
                "lng"        => -49.25248826354209,
            ],
            [
                "name"       => "Cuiaba",
                "email"      => "walter.henrique@magazineaziul.com.br",
                "region_id"  => $this->getRegion("Centro-oeste"),
                "manager_id" => $this->getUser("Walter Henrique"),
                "lat"        => -15.601754458320842,
                "lng"        => -56.09832706558089,
            ],
        ];

        Store::insert($stores);
    }
}
