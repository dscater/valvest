<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValoracionController extends Controller
{
    public function valoracion_user(Empresa $empresa)
    {
        $user = Auth::user();
        if ($user->tipo == 'EMPRESA' || $user->tipo == 'INVERSIONISTA') {
            if (!$user->valoracion_user) {
                $user->valoracion_user()->create([
                    "empresa_id" => $empresa->id,
                    "cantidad" => 1,
                ]);
            }
            $user->valoracion_user->cantidad = (int)$user->valoracion_user->cantidad + 1;
            $user->valoracion_user->save();
        }
        return response()->JSON(true);
    }

    public function empresa(Empresa $empresa)
    {
        if (!$empresa->valoracion) {
            $empresa->valoracion()->create([
                "fondos" => 0,
                "valoracion_previa" => 0,
                "limite_bajo" => 0,
                "limite_alto" => 0,
            ]);
        }

        $array_cuestionario = $empresa->cuestionario->array_cuestionario;


        

        $valoracion = null;
        return response()->JSON($valoracion);
    }
}
