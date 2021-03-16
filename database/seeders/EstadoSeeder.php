<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
      //  Estado::factory()->count(3)->create();
      public function run()
    {
       // Estado::factory()->count(3)->create();
       Estado::created(['nombre'=>'Activo',
            'descripcion'=>'se refiere cuando algo se puede usar o alguien esta libre',
            ]);
        Estado::created(['nombre'=>'No Activo',
            'descripcion'=>'se refiere cuando algo se puede usar o alguien esta libre',
        ]);
        Estado::created(['nombre'=>'En curso',
            'descripcion'=>'se refiere cuando algo esta en proceso o en desarrollo',
        ]);
        Estado::created(['nombre'=>'Finalizado',
            'descripcion'=>'se refiere cuando algo esta completo o se termino',
        ]);
    }
    }

