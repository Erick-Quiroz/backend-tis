<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Jurado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class JuradoController extends Controller
{
    public function registerJurado(Request $request)
    {
        $data = $request->only('id_usuario', 'id_mesa');

        $validator = Validator::make($data, [
            'id_usuario' => 'required|integer',
            'id_mesa' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        $jurado = Jurado::create([
            'id_usuario' => $request->id_usuario,
            'id_mesa' => $request->id_mesa,
        ]);

        return response()->json([
            'message' => 'Jurado created',
            'jurado' => $jurado
        ], Response::HTTP_OK);
    }

    public function index()
    {
        return Jurado::get();
    }
}