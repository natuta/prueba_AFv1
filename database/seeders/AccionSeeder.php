<?php

namespace Database\Seeders;

use App\Models\Accion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accion::create([
            'nombre' => 'iniciado sesion',
        ]);
        Accion::create([
            'nombre' => 'cierrado sesion',
        ]);
        Accion::create([
            'nombre' => 'creado',
        ]);
        Accion::create([
            'nombre' => 'editado',
        ]);
        Accion::create([
            'nombre' => 'borrado',
        ]);
    }
}
