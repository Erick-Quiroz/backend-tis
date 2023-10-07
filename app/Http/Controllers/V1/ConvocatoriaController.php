<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Convocatoria;
use Illuminate\Http\Request;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ConvocatoriaController extends Controller
{


    public function registerConvocatoria(Request $request)
    {
        //Indicamos que solo queremos recibir name, email y password de la request
        $data = $request->only('name',
        'dateB',
        'dateE',
        'facultad',
        'carrera',
        'tipo',);

        //Realizamos las validaciones
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'dateB' => 'required|string',
            'dateE' => 'required|string',
            'facultad' => 'required|string',
            'carrera' => 'required|string',
            'tipo' => 'required|string',
        ]);

        //Devolvemos un error si fallan las validaciones
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        //Creamos el nuevo usuario
        $convocatoria = Convocatoria::create([
            'name' => $request->name,
            'dateB' => $request->dateB,
            'dateE' => $request->dateE,
            'facultad' => $request->facultad,
            'carrera' => $request->carrera,
            'tipo' => $request->tipo,
            
            
        ]);

        //Nos guardamos el usuario y la contraseña para realizar la petición de token a JWTAuth
        //$credentials = $request->only('email', 'password');

        //Devolvemos la respuesta con el token del usuario
        return response()->json([
            'message' => 'Convocatoria created',
            //'token' => JWTAuth::attempt($credentials),
            'convocatoria' => $convocatoria
        ], Response::HTTP_OK);
    }
    public function index()
    {
        //Listamos todos los productos
        return Convocatoria::get();
    }

}
