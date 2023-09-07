<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Valoracion;
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

    public function empresa(Empresa $empresa, Request $request)
    {

        $valor_cuestionario = Valoracion::getValorCuestionario($empresa);
        $capital_inversion = $empresa->cuestionario->array_cuestionario[1];
        $fondos = $request->fondos;

        $total_valoracion = (float)$capital_inversion + (float)$fondos * $valor_cuestionario;
        $limite_bajo = (float)$total_valoracion * 0.75;
        $limite_alto = (float)$total_valoracion * 1.25;

        if (!$empresa->valoracion) {
            $empresa->valoracion()->create([
                "fondos" => $fondos,
                "valoracion_previa" => $total_valoracion,
                "limite_bajo" => $limite_bajo,
                "limite_alto" => $limite_alto,
            ]);
        } else {
            $empresa->valoracion->update([
                "fondos" => $fondos,
                "valoracion_previa" => $total_valoracion,
                "limite_bajo" => $limite_bajo,
                "limite_alto" => $limite_alto,
            ]);
        }
        return response()->JSON($empresa->valoracion);
    }
}
