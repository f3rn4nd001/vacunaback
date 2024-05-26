<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catfechas;

class catfechasSeeder extends Seeder
{
    public function run(): void
    {
            
        $Catfechas = new Catfechas;
        $Catfechas-> ecodfechas = '01ae3cd3-144c-46a3-9aaa-bb9161b74737';
        $Catfechas-> fhvacunacion = '2020-05-30';
        $Catfechas-> ecodEstatus = '2660376e-dbf8-44c1-b69f-b2554e3e5d4c';
        $Catfechas-> ecodMunicipio = 1;
        $Catfechas-> Modulo = "Moduloa";
        $Catfechas-> Direccion = "Av. Mariana Barcenas s/n col,autoria 322322";
        
        $Catfechas->save();

        $Catfechas1 = new Catfechas;
        $Catfechas1-> ecodfechas = '266b69f-dbf8-44c1-0376e-b2554e3e5d4c';
        $Catfechas1-> fhvacunacion = '2020-03-04';
        $Catfechas1-> ecodEstatus = '93a484c5-ce42-435e-98ac-12bc215d95b5';
        $Catfechas1-> ecodMunicipio = 2;
        $Catfechas1-> Modulo = "Modulob";
        $Catfechas1-> Direccion = "Av. Mariana Barcenas s/n col,autoria 322322";
        $Catfechas1->save();

        $Catfechas2 = new Catfechas;
        $Catfechas2-> ecodfechas = '5b207c0f-018a-497e-b376-941e35337dad';
        $Catfechas2-> fhvacunacion = '2020-08-04';
        $Catfechas2-> ecodEstatus = '93a484c5-ce42-435e-98ac-12bc215d95b5';
        $Catfechas2-> ecodMunicipio = 3;
        $Catfechas2-> Modulo = "Moduloc";
        $Catfechas2-> Direccion = "Av. Mariana Barcenas s/n col,autoria 322322";
        $Catfechas2->save();

        $Catfechas3 = new Catfechas;
        $Catfechas3-> ecodfechas = '93c52bc21-ce42-435e-98ac-a48412bc215d95b5';
        $Catfechas3-> fhvacunacion = '2020-02-04';
        $Catfechas3-> ecodEstatus = '93a484c5-ce42-435e-98ac-12bc215d95b5';
        $Catfechas3-> ecodMunicipio = 4;
        $Catfechas3-> Modulo = "Modulod";
        $Catfechas3-> Direccion = "Av. Mariana Barcenas s/n col,autoria 322322";
        $Catfechas3->save();

        $Catfechas4 = new Catfechas;
        $Catfechas4-> ecodfechas = 'fa6cc9a2-f221-4e27-b575-cc9a2x98d27a';
        $Catfechas4-> fhvacunacion = '2020-01-04';
        $Catfechas4-> ecodEstatus = '93a484c5-ce42-435e-98ac-12bc215d95b5';
        $Catfechas4-> ecodMunicipio = 5;
        $Catfechas4-> Modulo = "Moduloe";
        $Catfechas4-> Direccion = "Av. Mariana Barcenas s/n col,autoria 322322";
        $Catfechas4->save();
    }

}