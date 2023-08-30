<?php

namespace App\Http\Controllers;

use App\Models\Finanza;
use App\Models\HistorialAccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinanzaController extends Controller
{
    public $validacion = [
        "empresa_id" => "required",
        "gestion" => "required|numeric|min:1",
    ];

    public $mensajes = [
        "empresa_id.required" => "Debes indicar una empresa",
        "gestion.required" => "Debes indicar una gestión",
        "gestion.numeric" => "El valor de gestión debe ser por lo menos 1",
    ];
    public function store(Request $request)
    {
        $request->validate($this->validacion, $this->mensajes);
        DB::beginTransaction();
        try {
            $request["ganancia"] = 0;
            $request["costo_bienes_vendidos"] = 0;
            $request["ebitda"] = 0;
            $request["beneficio_neto"] = 0;
            $request["capital_trabajo"] = 0;
            $request["cambio_capital_trabajo"] = 0;
            $request["cambio_deuda_pendiente"] = 0;

            $nueva_finanza = Finanza::create($request->all());
            $datos_original = HistorialAccion::getDetalleRegistro($nueva_finanza, "finanzas");
            HistorialAccion::create([
                'user_id' => Auth::user()->id,
                'accion' => 'CREACIÓN',
                'descripcion' => 'EL USUARIO ' . Auth::user()->usuario . ' AGREGÓ UN REGISTRO DE FINANZAS EN LA EMPRESA ' . $nueva_finanza->empresa->nombre,
                'datos_original' => $datos_original,
                'modulo' => 'FINANZAS',
                'fecha' => date('Y-m-d'),
                'hora' => date('H:i:s')
            ]);

            DB::commit();
            return response()->JSON([
                'sw' => true,
                "nueva_finanza" => $nueva_finanza,
                'msj' => 'El registro se realizó de forma correcta',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->JSON([
                'sw' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
