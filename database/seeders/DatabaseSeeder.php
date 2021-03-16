<?php

namespace Database\Seeders;

use App\Models\Accion;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Rubro;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,
            AlmacenSeeder::class,
            EstadoSeeder::class,
            ContactoSeeder::class,
            ProveedorSeeder::class,
            UserSeeder::class,
            AccionSeeder::class,
            RubroSeeder::class,
            CategoriaSeeder::class,
            CiudadSeeder::class,
            EdificioSeeder::class,
            DepartamentoSeeder::class,
        ]);

    }
}
