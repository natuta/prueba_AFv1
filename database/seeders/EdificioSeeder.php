<?php

namespace Database\Seeders;

use App\Models\Edificio;
use Illuminate\Database\Seeder;

class EdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Edificio::factory()->count(8)->create();
       $edificio1= new Edificio();
       $edificio1->nombre="Piso #10";
       $edificio1->direccion="Av. Santos Dumont, c/Las Americas";
       $edificio1->ciudad_id=1;
       $edificio1->save();

       $edificio2= new Edificio();
       $edificio2->nombre="Piso #5";
       $edificio2->direccion="Av. G77, c/Los Tajibos";
       $edificio2->ciudad_id=1;
       $edificio2->save();

       $edificio3= new Edificio();
       $edificio3->nombre="Piso #3";
       $edificio3->direccion="Av. Omar Chavez Ortiz, c/Las Cusis";
       $edificio3->ciudad_id=2;
       $edificio3->save();

       $edificio4= new Edificio();
       $edificio4->nombre="Piso # 7";
       $edificio4->direccion="Av. Velasco, c/el Bajio";
       $edificio4->ciudad_id=1;
       $edificio4->save();

       $edificio5= new Edificio();
       $edificio5->nombre="Piso #8";
       $edificio5->direccion="Av. Murillo, c/ Independencia";
       $edificio5->ciudad_id=2;
       $edificio5->save();

       $edificio6= new Edificio();
       $edificio6->nombre="Piso #2";
       $edificio6->direccion="Av. Aniceto Arce, c/Los Molinos";
       $edificio6->ciudad_id=3;
       $edificio6->save();

       $edificio7= new Edificio();
       $edificio7->nombre="Piso #1";
       $edificio7->direccion="Av.Valladares, c/Las tres cruces";
       $edificio7->ciudad_id=3;
       $edificio7->save();

       $edificio8= new Edificio();
       $edificio8->nombre="Piso #2";
       $edificio8->direccion="Av. Santos Dumont, c/Las Americas";
       $edificio8->ciudad_id=1;
       $edificio8->save();

       $edificio9= new Edificio();
       $edificio9->nombre="Piso #8";
       $edificio9->direccion="Av. Miraflores, c/Los Pinos";
       $edificio9->ciudad_id=2;
       $edificio9->save();

       $edificio10= new Edificio();
       $edificio10->nombre="Piso #10";
       $edificio10->direccion="Av. Vinto, c/Tarija";
       $edificio10->ciudad_id=5;
       $edificio10->save();
    }
}
