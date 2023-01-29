<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function collection(Request $request)
    {

        $request->validate([
            'persona'
        ]);

        // EJEMPLO POSTMAN
        // {
        //  "persona" : "Juan"
        // }

        $usuarioBuscado = $request->persona; // Usuario para comprobar su existencia

        $users = collect([ // Grupo de usuarios
            ['name' => 'Juan', 'dni => X54645345'],
            ['name' => 'Jose', 'dni => X76545345'],
            ['name' => 'Ana', 'dni => X96325345'],
        ]);

        if ($users->where('name', '=', $usuarioBuscado)->count() > 0) { // Se comprueba si se encuentra el usuario en busqueda
            echo 'La persona existe';
        } else {
            echo 'La persona NO existe';
        }

        $filtered = $users->sortBy('name'); // Se ordena alfabeticamente

        return response()->json($filtered);
    }
}
