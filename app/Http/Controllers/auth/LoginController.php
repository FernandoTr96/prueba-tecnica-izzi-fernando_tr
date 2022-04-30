<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct(){
        
    }

    public function index(){
        return view('auth/login');
    }

    public function loginWithEmailAndPassword(Request $req){
        
        $req->validate([
            'correo' => ['required', 'max:255','email'],
            'clave' => ['required', 'max:255']
        ]);

        $formData = $req->all();
        $rememberme = $req->filled('recuerdame');

        $credentials = [
            'correo' => $formData['correo'],
            'password' => $formData['clave'],
            'acceso' => 1
        ];

        if(Auth::attempt($credentials,$rememberme))
        {
            $req->session()->regenerate();
            return redirect()->route('homePage');
        }
  
        return back()->withErrors([
            'msg' => 'No fue posible iniciar sesión... revise sus credenciales o asegurese de tener el acceso',
        ]);
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->to('/');
    }

}
