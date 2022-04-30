<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InitUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cargar administrador
        User::create([
            'nombre' => 'John',
            'apellidoPaterno' => 'Doe',
            'apellidoMaterno' => 'Perez',
            'correo' => 'admin@gmail.com',
            'clave' => Hash::make('123'),
            'perfil_id' => 1
        ]);

        //cargar capturista
        User::create([
            'nombre' => 'Jose',
            'apellidoPaterno' => 'Flores',
            'apellidoMaterno' => 'Sanchez',
            'correo' => 'capturista@gmail.com',
            'clave' => Hash::make('123'),
            'perfil_id' => 2
        ]);

        //cargar usuario bloqueado
        User::create([
            'nombre' => 'Josue',
            'apellidoPaterno' => 'Campos',
            'apellidoMaterno' => 'Mora',
            'correo' => 'bloqueado@gmail.com',
            'clave' => Hash::make('123'),
            'acceso' => 0, // bloqueo
            'perfil_id' => 2
        ]);
    }
}
