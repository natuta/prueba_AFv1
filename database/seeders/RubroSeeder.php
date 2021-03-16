<?php

namespace Database\Seeders;

use App\Models\Rubro;
use Illuminate\Database\Seeder;

class RubroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Rubro::factory(20)->create();
        Rubro::create([
            'nombre'=> 'Edificaciones',
            'descripcion'=> 'Rubro de edificaciones',
            'vida_util'=> 40,
            'coeficiente_depr'=> 2.5,
        ]);

        Rubro::create([
            'nombre'=> 'Muebles y enseres de oficina',
            'descripcion'=> 'Rubro de muebeles y enseres de oficina',
            'vida_util'=> 10,
            'coeficiente_depr'=> 10.0,
        ]);

        Rubro::create([
            'nombre'=> 'Maquinaria en general',
            'descripcion'=> 'Rubro de maquinarias',
            'vida_util'=> 8,
            'coeficiente_depr'=> 12.5,
        ]);

        Rubro::create([
            'nombre'=> 'Equipos e instalaciones',
            'descripcion'=> 'Rubro de equipos e instalaciones',
            'vida_util'=> 8,
            'coeficiente_depr'=> 12.5,
        ]);

        Rubro::create([
            'nombre'=> 'Barcos y lanchas en general',
            'descripcion'=> 'Rubro de barco y lanchas en general',
            'vida_util'=> 10,
            'coeficiente_depr'=> 10.0,
        ]);

        Rubro::create([
            'nombre'=> 'Vehiculos automotores',
            'descripcion'=> 'Rubro de vehiculos y automotores',
            'vida_util'=> 5,
            'coeficiente_depr'=> 20.0,
        ]);

        Rubro::create([
            'nombre'=> 'Aviones',
            'descripcion'=> 'Rubro de aviones en general',
            'vida_util'=> 5,
            'coeficiente_depr'=> 20.0,
        ]);

        Rubro::create([
            'nombre'=> 'Maquinaria para la construccion',
            'descripcion'=> 'Rubro de maquinarias para la construccion',
            'vida_util'=> 5,
            'coeficiente_depr'=> 20.0,
        ]);

        Rubro::create([
            'nombre'=> 'Maquinaria agricola',
            'descripcion'=> 'Rubro de maquinarias agricolas',
            'vida_util'=> 4,
            'coeficiente_depr'=> 25.5,
        ]);

        Rubro::create([
            'nombre'=> 'Maquinaria agricola',
            'descripcion'=> 'Rubro de maquinarias agricolas',
            'vida_util'=> 4,
            'coeficiente_depr'=> 25.0,
        ]);

        Rubro::create([
            'nombre'=> 'Animales de trabajo',
            'descripcion'=> 'Rubro de Animales de trabajo',
            'vida_util'=> 4,
            'coeficiente_depr'=> 25.0,
        ]);

        Rubro::create([
            'nombre'=> 'Herramientas en general',
            'descripcion'=> 'Rubro de herramientas en general',
            'vida_util'=> 4,
            'coeficiente_depr'=> 25.5,
        ]);

        Rubro::create([
            'nombre'=> 'Reproductores y hembras de pedigree o puros por cruza',
            'descripcion'=> 'Rubro de reproductores y hembras de pedigree o puros por cruza',
            'vida_util'=> 8,
            'coeficiente_depr'=> 12.5,
        ]);

        Rubro::create([
            'nombre'=> 'Equipos de computacion',
            'descripcion'=> 'Rubro de equipos de computacion',
            'vida_util'=> 4,
            'coeficiente_depr'=> 25.0,
        ]);

        Rubro::create([
            'nombre'=> 'Canales de regadio y pozos',
            'descripcion'=> 'Rubro de canales de regadio',
            'vida_util'=> 20,
            'coeficiente_depr'=> 5.0,
        ]);

        Rubro::create([
            'nombre'=> 'Estanques, bañaderos y abrevaderos',
            'descripcion'=> 'Rubro de estanques, bañaderos y abrevaderos',
            'vida_util'=> 10,
            'coeficiente_depr'=> 10.0,
        ]);

        Rubro::create([
            'nombre'=> 'Alambrados, tranqueras y vallas',
            'descripcion'=> 'Rubro de alambrados, tranqueras y vallas',
            'vida_util'=> 10,
            'coeficiente_depr'=> 10.0,
        ]);

        Rubro::create([
            'nombre'=> 'Viviendas para el personal',
            'descripcion'=> 'Rubro de viviendas para el personal',
            'vida_util'=> 20,
            'coeficiente_depr'=> 5.0,
        ]);

        Rubro::create([
            'nombre'=> 'Muebles y enseres en las viviendas para el personal',
            'descripcion'=> 'Rubro de muebles y enseres en la vivienda para el personal',
            'vida_util'=> 10,
            'coeficiente_depr'=> 10.0,
        ]);

        Rubro::create([
            'nombre'=> 'Silos, almacenes y galpones',
            'descripcion'=> 'Rubro de silos, almacenes y galpones',
            'vida_util'=> 20,
            'coeficiente_depr'=> 5.0,
        ]);

        Rubro::create([
            'nombre'=> 'Tinglados y cobertizos de madera',
            'descripcion'=> 'Rubro de tinglados y cobertizos de madera',
            'vida_util'=> 5,
            'coeficiente_depr'=> 20.0,
        ]);

        Rubro::create([
            'nombre'=> 'Instalaciones de electrificacion y telefonia rurales',
            'descripcion'=> 'Rubro de instalaciones de electrificacion y telefonia rurales',
            'vida_util'=> 10,
            'coeficiente_depr'=> 10.0,
        ]);

        Rubro::create([
            'nombre'=> 'Caminos interiores',
            'descripcion'=> 'Rubro de caminos interiores',
            'vida_util'=> 10,
            'coeficiente_depr'=> 10.0,
        ]);

        Rubro::create([
            'nombre'=> 'Cañas de azucar',
            'descripcion'=> 'Rubro de cañas de azucar',
            'vida_util'=> 5,
            'coeficiente_depr'=> 20.0,
        ]);

        Rubro::create([
            'nombre'=> 'Vides',
            'descripcion'=> 'Rubro de vides',
            'vida_util'=> 8,
            'coeficiente_depr'=> 12.5,
        ]);

        Rubro::create([
            'nombre'=> 'Frutales',
            'descripcion'=> 'Rubro de vides',
            'vida_util'=> 8,
            'coeficiente_depr'=> 12.5,
        ]);

        Rubro::create([
            'nombre'=> 'Pozos Petroleros',
            'descripcion'=> 'Rubro de pozos Petroleros',
            'vida_util'=> 5,
            'coeficiente_depr'=> 20.0,
        ]);

        Rubro::create([
            'nombre'=> 'Lineas de recoleccion de la industria petrolera',
            'descripcion'=> 'Rubro de lineas de recoleccion de la industria petrolera',
            'vida_util'=> 5,
            'coeficiente_depr'=> 20.0,
        ]);

        Rubro::create([
            'nombre'=> 'Equipos de campo de la industria petrolera',
            'descripcion'=> 'Rubro de lineas de recoleccion de la industria petrolera',
            'vida_util'=> 8,
            'coeficiente_depr'=> 12.5,
        ]);

        Rubro::create([
            'nombre'=> 'Plantas de procesamiento de la industria petrolera',
            'descripcion'=> 'Rubro de plantas de procesamiento de la industria patrolera',
            'vida_util'=> 8,
            'coeficiente_depr'=> 12.5,
        ]);

        Rubro::create([
            'nombre'=> 'Ductos de la industria petrolera',
            'descripcion'=> 'Rubro de ductos de la industria petrolera',
            'vida_util'=> 10,
            'coeficiente_depr'=> 10.0,
        ]);

    }
}
