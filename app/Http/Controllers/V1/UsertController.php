<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Usert;
use Illuminate\Http\Request;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class UsertController extends Controller
{


    public function registerusert(Request $request)
    {
        //Indicamos que solo queremos recibir name, email y password de la request
        $data = $request->only('name',
        'lastname',
        'codsis',
        'cargo',
        'numberp',
        'facultad',
        'carrera',);

        //Realizamos las validaciones
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'codsis' => 'required|string',
            'cargo' => 'required|string',
            'numberp' => 'required|string',
            'facultad' => 'required|string',
            'carrera' => 'required|string',
        ]);

        //Devolvemos un error si fallan las validaciones
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        //Creamos el nuevo usuario
        $userst = Usert::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'codsis' => $request->codsis,
            'cargo' => $request->cargo,
            'numberp' => $request->numberp,
            'facultad' => $request->facultad,
            'carrera' => $request->carrera,
            
        ]);

        //Nos guardamos el usuario y la contraseña para realizar la petición de token a JWTAuth
        //$credentials = $request->only('email', 'password');

        //Devolvemos la respuesta con el token del usuario
        return response()->json([
            'message' => 'User created',
            //'token' => JWTAuth::attempt($credentials),
            'usert' => $userst
        ], Response::HTTP_OK);
    }
    public function index()
    {
        //Listamos todos los productos
        return Usert::get();
    }
    

}
