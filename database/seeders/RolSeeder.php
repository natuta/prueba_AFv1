<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name'=>'Propietario']);
        $rol2 = Role::create(['name'=>'Administrador']);
        $rol3 = Role::create(['name'=>'Responsable']);
        $rol4 = Role::create(['name'=>'Operador']);

        //Permisoso de administrador
        Permission::create(['name'=>'revisiones_tecnicas.index','description'=>'ver lista de revisiones tecnicas'])->assignRole([$rol1,$rol2,$rol4]);
        Permission::create(['name'=>'revisiones_tecnicas.show','description'=>'ver una revision tecnica'])->assignRole([$rol1,$rol2,$rol4]);
        Permission::create(['name'=>'revisiones_tecnicas.destroy','description'=>'eliminar una revision tecnics'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'revisiones_tecnicas.create','description'=>'crea una revision tecnica'])->assignRole([$rol1,$rol2,$rol4]);

        Permission::create(['name'=>'rubros.index','description'=>'ver lista de rubros'])->assignRole([$rol1,$rol2,$rol4,$rol3]);
        Permission::create(['name'=>'rubros.create','description'=>'crear rubro'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'rubros.edit','description'=>'editar rubro'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'rubros.show','description'=>'ver rubro'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'rubros.destroy','description'=>'eliminar rubro'])->assignRole([$rol1,$rol2]);

        Permission::create(['name'=>'categorias.index','description'=>'ver lista de categorias'])->assignRole([$rol1,$rol2,$rol4,$rol3]);
        Permission::create(['name'=>'categorias.create','description'=>'crear categoria'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'categorias.edit','description'=>'editar categoria'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'categorias.show','description'=>'ver categoria'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'categorias.destroy','description'=>'eliminar categoria'])->assignRole([$rol1,$rol2]);

        Permission::create(['name'=>'ciudades.index','description'=>'ver lista de ciudades'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'ciudades.create','description'=>'crear ciudades'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'ciudades.edit','description'=>'editar ciudades'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'ciudades.show','description'=>'ver ciudades'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'ciudades.destroy','description'=>'eliminar ciudades'])->assignRole([$rol1,$rol2]);

        Permission::create(['name'=>'edificios.index','description'=>'ver lista de edificios'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'edificios.create','description'=>'crear edificios'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'edificios.edit','description'=>'editar edificios'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'edificios.show','description'=>'ver edificios'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'edificios.destroy','description'=>'eliminar edificios'])->assignRole([$rol1,$rol2]);

        Permission::create(['name'=>'movimientos.index','description'=>'ver lista de movimientos'])->assignRole([$rol1,$rol2,$rol3]);
        Permission::create(['name'=>'movimientos.create','description'=>'realizar movimiento'])->assignRole([$rol1,$rol2]);
        //eliminar movimiento

        Permission::create(['name'=>'compras.index','description'=>'ver lista de compras'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'compras.create','description'=>'realizar compra'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'compras.destroy','description'=>'eliminar compra'])->assignRole([$rol1,$rol2]);

        //Permisos de responsable

        //Permisos de operador

        Permission::create(['name'=>'mantenimientos.index','description'=>'ver lista de mantenimientos'])->assignRole([$rol1,$rol2,$rol4]);
        Permission::create(['name'=>'mantenimientos.show','description'=>'ver un mantenimiento'])->assignRole([$rol1,$rol4]);
        Permission::create(['name'=>'mantenimientos.destroy','description'=>'eliminar mantenimiento'])->assignRole([$rol1,$rol4]);



        Permission::create(['name'=>'departamentos.index','description'=>'ver lista de departamentos'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'departamentos.create','description'=>'crear departamentos'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'departamentos.edit','description'=>'editar departamentos'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'departamentos.show','description'=>'ver departamentos'])->assignRole($rol1);
        Permission::create(['name'=>'departamentos.destroy','description'=>'eliminar departamentos'])->assignRole($rol1);

        Permission::create(['name'=>'estados.index','description'=>'ver lista de estados'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'estados.create','description'=>'crear estados'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'estados.edit','description'=>'editar estado'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'estados.show','description'=>'ver estado'])->assignRole($rol1);
        Permission::create(['name'=>'estados.destroy','description'=>'eliminar estado'])->assignRole($rol1);

        Permission::create(['name'=>'proveedores.index','description'=>'ver lista de proveedores'])->assignRole([$rol1,$rol2]);
        Permission::create(['name'=>'proveedores.create','description'=>'crear proveedor'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'proveedores.edit','description'=>'editar proveedor'])->assignRole([$rol1, $rol2]);
        Permission::create(['name'=>'proveedores.show','description'=>'ver proveedor'])->assignRole($rol1);
        Permission::create(['name'=>'proveedores.destroy','description'=>'eliminar estado'])->assignRole($rol1);



        Permission::create(['name'=>'administrar_roles','description'=>'administrar crud de roles'])->assignRole([$rol1]);
        Permission::create(['name'=>'administrar_usuarios','description'=>'administrar crud de usuarios'])->assignRole([$rol1]);



        Permission::create(['name'=>'egresos.index','description'=>'ver lista de activos fijos egresados'])->assignRole([$rol1]);
        Permission::create(['name'=>'egresos.show','description'=>'ver egreso de un activo fijo'])->assignRole([$rol1]);
        Permission::create(['name'=>'egresos.destroy','description'=>'eliminar un egreso deun activo fijo'])->assignRole([$rol1]);

        Permission::create(['name'=>'almacenes.index','description'=>'ver lista de almacenes'])->assignRole([$rol1]);
        Permission::create(['name'=>'almacenes.create','description'=>'crear almacen'])->assignRole([$rol1]);
        Permission::create(['name'=>'almacenes.edit','description'=>'eidtar almacen'])->assignRole([$rol1]);
        Permission::create(['name'=>'almacenes.show','description'=>'ver almacen'])->assignRole([$rol1]);
        Permission::create(['name'=>'almacenes.destroy','description'=>'eliminar almacen'])->assignRole([$rol1]);
    }
}
