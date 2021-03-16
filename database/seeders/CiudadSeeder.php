<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ciudad::factory()->count(10)->create();
        $ciudad1= new Ciudad();
        $ciudad1->nombre="Santa Cruz";
        $ciudad1->save();

        $ciudad2= new Ciudad();
        $ciudad2->nombre="La Paz";
        $ciudad2->save();

        $ciudad3= new Ciudad();
        $ciudad3->nombre="Cochabamba";
        $ciudad3->save();

        $ciudad4= new Ciudad();
        $ciudad4->nombre="Chuquisaca";
        $ciudad4->save();

        $ciudad5= new Ciudad();
        $ciudad5->nombre="Tarija";
        $ciudad5->save();

        $ciudad6= new Ciudad();
        $ciudad6->nombre="Oruro";
        $ciudad6->save();

        $ciudad7= new Ciudad();
        $ciudad7->nombre="Potosi";
        $ciudad7->save();

        $ciudad8= new Ciudad();
        $ciudad8->nombre="Beni";
        $ciudad8->save();

        $ciudad9= new Ciudad();
        $ciudad9->nombre="Pando";
        $ciudad9->save();
    }
}
