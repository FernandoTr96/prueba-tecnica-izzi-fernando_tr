<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subsidiary;

class InitSubsidiaries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sucursales

        $sucursales = [
            'Cuernavaca',
            'Yautepec',
            'Cuautla',
            'Acapulco'
        ];
        

        foreach ($sucursales as $sucursal){
            Subsidiary::create([
                'sucursal' => $sucursal
            ]);
        }

    }
}
