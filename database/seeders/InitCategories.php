<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class InitCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categorias

        $categorias = [
            'Electrónica',
            'Línea Blanca',
            'Deportes',
            'Alimentos',
            'Jardín'
        ];

        foreach ($categorias as $categoria){
            Category::create([
                'categoria' => $categoria
            ]);
        }
       
    }
}
