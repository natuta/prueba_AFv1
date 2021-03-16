<?php

namespace Database\Seeders;

use App\Models\Almacen;
use Illuminate\Database\Seeder;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Almacen::factory()->count(5)->create();
       
        Almacen::create([
            'direccion'=> 'Aeropuerto Viru-Viru Terminal de Cargas - Santa Cruz',
            'estado'=> 1,
        ]);
        Almacen::create([
            'direccion'=> 'Calle Fortin Corrales #176, Esq. Cañada Strongest - Santa Cruz',
            'estado'=> 2,
        ]);
        Almacen::create([
            'direccion'=> 'Pampa de la Isla Carretera a Cotoca, B. Venezuela Uv.141 - Santa Cruz',
            'estado'=> 1,
        ]);
        Almacen::create([
            'direccion'=> 'Av. Guillermo Killman - Cochabamba',
            'estado'=> 1,
        ]);
        Almacen::create([
            'direccion'=> 'Av. Capitan Victor Ustaris Km 7, B. La Florida - Cochabamba',
            'estado'=> 2,
        ]);
        Almacen::create([
            'direccion'=> 'C. 21 Plzla. Nataniel Aguirre Acha #79 - La Paz',
            'estado'=> 1,
        ]);
        Almacen::create([
            'direccion'=> 'Av. 6 de Marzo Km. 3 Carretera a Oruro, una cuadra de Cruce Viacha - El Alto',
            'estado'=> 2,
        ]);
        Almacen::create([
            'direccion'=> 'Calle 22 #8232 Ed. Centro Empresarial, Piso 4 Of.402 - El Alto',
            'estado'=> 1,
        ]);
        Almacen::create([
            'direccion'=> 'C. Mercado Ed. Electra Piso 3 - La Paz',
            'estado'=> 2,
        ]);
    }
 }

