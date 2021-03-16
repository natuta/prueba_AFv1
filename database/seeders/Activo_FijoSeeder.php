<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activo_Fijo;
class Activo_FijoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activo_Fijo::created(['nombre'=>'laptop hp id123',
            'fecha_obtencion'=>25/01/2021,
            'valor_compra'=>2160,'estado_id'=>1,
            'categoria_id'=>1,
            'almacen_id'=>2
        ]);
        Activo_Fijo::created(['nombre'=>'televisor 43 id123',
            'fecha_obtencion'=>27/01/2021,
            'valor_compra'=>2320,'estado_id'=>1,
            'categoria_id'=>4,
            'almacen_id'=>1
        ]);
        Activo_Fijo::created(['nombre'=>'automovil de 2009 toyota',
            'fecha_obtencion'=>25/01/2021,
            'valor_compra'=>32160,'estado_id'=>1,
            'categoria_id'=>6,
            'almacen_id'=>2
        ]);
        Activo_Fijo::created(['nombre'=>'volvo del 2017 con suspecnvion alta',
            'fecha_obtencion'=>25/01/2021,
            'valor_compra'=>90060,'estado_id'=>1,
            'categoria_id'=>6,
            'almacen_id'=>2
        ]);
        Activo_Fijo::created(['nombre'=>'escritorio de metal',
            'fecha_obtencion'=>25/01/2021,
            'valor_compra'=>7560,'estado_id'=>1,
            'categoria_id'=>2,
            'almacen_id'=>2
        ]);
        
    }
}
