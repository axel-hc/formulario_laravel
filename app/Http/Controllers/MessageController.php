<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //Metodo que va a guardar el mensaje recibido de AJAX
    public function store(Request $request)
    {
        //Validar que no esten vacios los campos
        $validate = $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'mensaje' => 'required|string'
        ]);

        //obtiene la ruta del archivo mensajes.json en el storage
        $file = storage_path('app/mensajes.json');

        //Si hay archivo Lee contenido del archivo
        if(file_exists($file)) {
            $mensajes = json_decode(file_get_contents($file), true);
        } else{
            $mensajes = [];
        
        }

        //Creamos el arreglo con su msj
        $mensajes[] = [

            'nombre' => $validate['nombre'],
            'email' => $validate['email'],
            'mensaje' => $validate['mensaje'],
            'fecha' => now()->format('Y-m-d'),

        ];

        //Aqui se guarda el archivo en formato json de nuevo
        file_put_contents($file, json_encode($mensajes, JSON_PRETTY_PRINT));

        //manda Json al frontend
        return response()->json(['success' => true, 'data' => $validate]);
    }

    //Metodo para mostrar los registros -tabla-
    public function registros()
    {
        $file = storage_path('app/mensajes.json');

        $mensajes = file_exists($file)
            ? json_decode(file_get_contents($file), true)
            : [];

        return view('registros',['mensajes' => $mensajes]);

    }
}
