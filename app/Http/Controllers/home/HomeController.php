<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Subsidiary;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        
    }

    public function index(){

        $counters = [
            'Usuarios' => [
                'icono' => '<i class="fa-solid fa-users text-4xl"></i>',
                'numero' => User::count()
            ],
            'Perfiles' => [
                'icono' => '<i class="fa-solid fa-user-secret text-4xl"></i>',
                'numero' => Profile::count()
            ],
            'Productos' => [
                'icono' => '<i class="fa-solid fa-box-open text-4xl"></i>',
                'numero' => Product::count()
            ],
            'Categorias' => [
                'icono' => '<i class="fa-solid fa-tag text-4xl"></i>',
                'numero' => Category::count()
            ],
            'Sucursales' => [
                'icono' => '<i class="fa-solid fa-building text-4xl"></i>',
                'numero' => Subsidiary::count()
            ]
        ];

        return view('home',compact('counters'));
    }
}
