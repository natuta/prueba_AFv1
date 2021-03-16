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
            CategoriaSeeder::class,
            
            Activo_FijoSeeder::class,
        ]);

    }
}
