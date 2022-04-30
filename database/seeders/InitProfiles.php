<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class InitProfiles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // perfiles

        $perfiles = [
            'administrador',
            'capturista'
        ];

      
        foreach ($perfiles as $perfil){
            Profile::create([
                'perfil' => $perfil
            ]);
        }

    }
}
