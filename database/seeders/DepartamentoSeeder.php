<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Departamento::factory()->count(20)->create();
     
        $dpto1= new Departamento();
        $dpto1->nombre="Recursos Humanos";
        $dpto1->descripcion="Gestiona a las personas para garantizar el cumplimento de sus funciones";
        $dpto1-> edificio_id=1;
        $dpto1->save();

        $dpto2= new Departamento();
        $dpto2->nombre="Finanzas";
        $dpto2->descripcion="Gestiona la financiación para las necesidades de la empresa";
        $dpto2-> edificio_id=2;
        $dpto2->save();

        $dpto3= new Departamento();
        $dpto3->nombre="Marketing";
        $dpto3->descripcion="Gestiona la mercadotecnia, para conseguir más ventas y atender mejor a los clientes.";
        $dpto3-> edificio_id=2;
        $dpto3->save();

        $dpto4= new Departamento();
        $dpto4->nombre="Compras";
        $dpto4->descripcion="Tiene la responsabilidad de adquirir los insumos";
        $dpto4-> edificio_id=1;
        $dpto4->save();

        $dpto5= new Departamento();
        $dpto5->nombre="Logística y Operaciones";
        $dpto5->descripcion="Gestiona la entrega / devolución de los productos comprados";
        $dpto5-> edificio_id=3;
        $dpto5->save();

        $dpto6= new Departamento();
        $dpto6->nombre="Control de Gestión";
        $dpto6->descripcion="Permite obtener las informaciones fiables y oportunas, para la toma de decisiones operativas.";
        $dpto6-> edificio_id=2;
        $dpto6->save();

        $dpto7= new Departamento();
        $dpto7->nombre="Direccion General";
        $dpto7->descripcion="Establece hacia dónde va la empresa y establece los objetivos de la misma";
        $dpto7-> edificio_id=7;
        $dpto7->save();
    
    }
}
