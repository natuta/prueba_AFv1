<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Propietario',
            'apellido' => 'Remote',
            'email' => 'propremote@afibo.com',
            'sexo' => 'Hombre',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'estado_id' => 1,
            'remember_token' => Str::random(10),
        ])->assignRole('Propietario');

        User::create([
            'name' => 'Admin',
            'apellido' => 'Remote',
            'email' => 'adminremote@afibo.com',
            'sexo' => 'Hombre',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'estado_id' => 1,
            'remember_token' => Str::random(10),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Responsable',
            'apellido' => 'Remote',
            'email' => 'reponsableremote@afibo.com',
            'sexo' => 'Hombre',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'estado_id' => 1,
            'remember_token' => Str::random(10),
        ])->assignRole('Responsable');

        User::create([
            'name' => 'Operador',
            'apellido' => 'Remote',
            'email' => 'operaremote@afibo.com',
            'sexo' => 'Hombre',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'estado_id' => 1,
            'remember_token' => Str::random(10),
        ])->assignRole('Operador');

        User::factory()->count(6)->create();
    }
}
