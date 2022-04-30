<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function __construct(){
        
    }

    public function index(){
        return view('auth/register');
    }

    public function create(Request $req){

        $req->validate([
            'nombre' => 'required | max:60',
            'apellidoPaterno' => 'required | max:60',
            'apellidoMaterno' => 'required | max:60',
            'correo' => 'required | unique:users,correo | max:255 | email',
            'clave' => 'required | max:255 | min:3 | confirmed',
            'clave_confirmation' => 'required'
        ]);

        $newUser = $req->all();

        try {
            
            User::create([
                'nombre' => $newUser['nombre'],
                'apellidoPaterno' =>  $newUser['apellidoPaterno'],
                'apellidoMaterno' =>  $newUser['apellidoMaterno'],
                'correo' =>  $newUser['correo'],
                'clave' => Hash::make($newUser['clave'])
            ]);

        }catch (\Illuminate\Database\QueryException $e) {
            
            return back()->withErrors([
                'msg' => 'Error: '.$e->getMessage()
            ]);

        }

        $credentials = [
            'correo' => $newUser['correo'],
            'password' => $newUser['clave']
        ];

        if(Auth::attempt($credentials))
        {
            $req->session()->regenerate();
            return redirect()->route('homePage');
        }
        else
        {
            return back()->withErrors([
                'msg' => 'Las credenciales no coinciden con nuestros registros !! No es posible iniciar sesión...',
            ]);
        }
  
    }
}
