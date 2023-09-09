<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Finanza;
use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ValoracionController extends Controller
{
    public function valoracion_user(Empresa $empresa)
    {
        $user = Auth::user();
        if ($user->tipo == 'EMPRESA' || $user->tipo == 'INVERSIONISTA') {
            $existe_valoracion = $user->valoracion_user()->where("empresa_id", $empresa->id)->get()->first();
            if (!$existe_valoracion) {
                $user->valoracion_user()->create([
                    "empresa_id" => $empresa->id,
                    "cantidad" => 1,
                ]);
            } else {
                $existe_valoracion->cantidad = (int)$existe_valoracion->cantidad + 1;
                $existe_valoracion->save();
            }
        }
        return response()->JSON(true);
    }

    public function empresa(Empresa $empresa, Request $request)
    {

        if ($empresa->cuestionario && $empresa->cuestionario->array_cuestionario) {
            $valor_cuestionario = Valoracion::getValorCuestionario($empresa);
            $capital_inversion = $empresa->cuestionario->array_cuestionario[1];
            if (isset($request->fondos)) {
                $fondos = $request->fondos;
            } else {
                $fondos = $empresa->valor_fondo;
            }

            // obtener valoracion
            $total_valoracion = (float)$capital_inversion + (float)$fondos * $valor_cuestionario;
            $limite_bajo = (float)$total_valoracion * 0.75;
            $limite_alto = (float)$total_valoracion * 1.25;

            // obtener la valuacion
            $valuacion = Valoracion::getValuacion($empresa);

            // obtener ultimo ebitda
            $ultima_finanza = Finanza::where("empresa_id", $empresa->id)
                ->where("ebitda", ">", 0)
                ->where("ebitda", "!=", null)
                ->orderBy("id", "asc")
                ->get()->last();
            $ultimo_ebitda = 0;
            if ($ultima_finanza) {
                $ultimo_ebitda = $ultima_finanza->ebitda;
            }

            $valoracion_empresa = null;
            if (!$empresa->valoracion) {
                $valoracion_empresa = $empresa->valoracion()->create([
                    "fondos" => $fondos,
                    "valoracion_previa" => $total_valoracion,
                    "limite_bajo" => $limite_bajo,
                    "limite_alto" => $limite_alto,
                    "valuacion" => $valuacion,
                    "ultimo_ebitda" => $ultimo_ebitda
                ]);
            } else {
                $valoracion_empresa = $empresa->valoracion;
                $valoracion_empresa->update([
                    "fondos" => $fondos,
                    "valoracion_previa" => $total_valoracion,
                    "limite_bajo" => $limite_bajo,
                    "limite_alto" => $limite_alto,
                    "valuacion" => $valuacion,
                    "ultimo_ebitda" => $ultimo_ebitda
                ]);
            }

            // grafico
            $data = [];
            $categories = [];
            $finanzas = Finanza::where("empresa_id", $empresa->id)
                ->where("flujo_caja_libre", ">", 0)
                ->where("flujo_caja_libre", "!=", null)
                ->orderBy("id", "asc")
                ->get();
            $tasa_supervivencia = [
                "name" => "Tasa de supervivencia",
                "data" => [],
                "color" => "#27C0FD",
            ];
            $tasa_fracaso = [
                "name" => "Tasa de fracaso",
                "data" => [],
                "color" => "#083A54",
            ];

            $valuacion = $valoracion_empresa->valuacion;
            foreach ($finanzas as $f) {
                $gestion = $f->gestion;
                $gestion = substr($gestion, 2, 2);
                // agregar categoria
                $categories[] = "01/" . $gestion . " - 12/" . $gestion;

                // tasa de supervivencia
                // (FLUJO CAJA LIBRE / VALUACIÓN) * 100
                $tasa_sup = 0;
                if ($valuacion > 0) {
                    $tasa_sup = ((float)$f->flujo_caja_libre / $valuacion) * 100;
                }
                $tasa_frac = 100 - $tasa_sup;

                $tasa_supervivencia["data"][] = $tasa_sup;
                $tasa_fracaso["data"][] = $tasa_frac;
            }
            $data[] = $tasa_fracaso;
            $data[] = $tasa_supervivencia;


            return response()->JSON([
                "empresa" => $empresa,
                "valoracion" => $valoracion_empresa,
                "data" => $data,
                "categories" => $categories
            ]);
        }
        return response()->JSON([
            "message" => "No se pudo obtener la valoración debido a la falta de información sobre la empresa seleccionada"
        ], 500);
    }

    public function show(Valoracion $valoracion)
    {
    }
}
