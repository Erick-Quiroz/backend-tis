<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Asociacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AsociacionFrenteCandidatoEleccionController extends Controller
{
    public function registerAsociacion(Request $request)
    {
        $data = $request->only('frente_id', 'candidato_id', 'eleccion_id');

        $validator = Validator::make($data, [
            'frente_id' => 'required|integer',
            'candidato_id' => 'required|integer',
            'eleccion_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        $asociacion = Asociacion::create([
            'frente_id' => $request->frente_id,
            'candidato_id' => $request->candidato_id,
            'eleccion_id' => $request->eleccion_id,
        ]);

        return response()->json([
            'message' => 'Asociación creada',
            'asociacion' => $asociacion
        ], Response::HTTP_OK);
    }

    public function index()
    {
        return Asociacion::get();
    }
}