<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Finanza;
use App\Models\HistorialAccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

class FinanzaController extends Controller
{
    public $validacion = [
        "empresa_id" => "required",
        "gestion" => "required|numeric|min:1",
        "ganancia" => "required|numeric|min:1",
        "costo_bienes_vendidos" => "required|numeric|min:1",
        "ebitda" => "required|numeric",
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

    public function actualizaColumna(Finanza $finanza, Request $request)
    {
        $finanza[$request->col] = $request->valor;
        $finanza->save();
        return response()->JSON(true);
    }

    public function getAnioAnterior(Empresa $empresa)
    {
        $ultimo = Finanza::where("empresa_id", $empresa)->orderBy("gestion", "asc")->get()->last();
        return response()->JSON($ultimo);
    }

    public function getMedias(Empresa $empresa)
    {
        $finanzas = Finanza::where("empresa_id", $empresa->id)->get();
        $array_sumas = [
            "ganancia" => 0,
            "costo_bienes_vendidos" => 0,
            "salarios" => 0,
            "otros_gastos_operativos" => 0,
            "ebitda" => 0,
            "da" => 0,
            "ebit" => 0,
            "interes" => 0,
            "impuestos" => 0,
            "beneficio_neto" => 0,
            "cuentas_cobrar" => 0,
            "inventario" => 0,
            "cuentas_pagar" => 0,
            "capital_trabajo" => 0,
            "cambio_capital_trabajo" => 0,
            "gastos_capital" => 0,
            "deuda_final_anio" => 0,
            "cambio_deuda_pendiente" => 0,
            "flujo_caja_libre_capital" => 0,
            "recaudacion_fondos_futura" => 0,
            "flujo_caja_libre" => 0,
        ];

        $array_medias = [
            "ganancia" => 0,
            "costo_bienes_vendidos" => 0,
            "salarios" => 0,
            "otros_gastos_operativos" => 0,
            "ebitda" => 0,
            "da" => 0,
            "ebit" => 0,
            "interes" => 0,
            "impuestos" => 0,
            "beneficio_neto" => 0,
            "cuentas_cobrar" => 0,
            "inventario" => 0,
            "cuentas_pagar" => 0,
            "capital_trabajo" => 0,
            "cambio_capital_trabajo" => 0,
            "gastos_capital" => 0,
            "deuda_final_anio" => 0,
            "cambio_deuda_pendiente" => 0,
            "flujo_caja_libre_capital" => 0,
            "recaudacion_fondos_futura" => 0,
            "flujo_caja_libre" => 0,
        ];
        foreach ($finanzas as $finanza) {
            $array_sumas["ganancia"] += (float)$finanza->ganancia;
            $array_sumas["costo_bienes_vendidos"] += (float)$finanza->costo_bienes_vendidos;
            $array_sumas["salarios"] += (float)$finanza->salarios;
            $array_sumas["otros_gastos_operativos"] += (float)$finanza->otros_gastos_operativos;
            $array_sumas["ebitda"] += (float)$finanza->ebitda;
            $array_sumas["da"] += (float)$finanza->da;
            $array_sumas["ebit"] += (float)$finanza->ebit;
            $array_sumas["interes"] += (float)$finanza->interes;
            $array_sumas["impuestos"] += (float)$finanza->impuestos;
            $array_sumas["beneficio_neto"] += (float)$finanza->beneficio_neto;
            $array_sumas["cuentas_cobrar"] += (float)$finanza->cuentas_cobrar;
            $array_sumas["inventario"] += (float)$finanza->inventario;
            $array_sumas["cuentas_pagar"] += (float)$finanza->cuentas_pagar;
            $array_sumas["capital_trabajo"] += (float)$finanza->capital_trabajo;
            $array_sumas["cambio_capital_trabajo"] += (float)$finanza->cambio_capital_trabajo;
            $array_sumas["gastos_capital"] += (float)$finanza->gastos_capital;
            $array_sumas["deuda_final_anio"] += (float)$finanza->deuda_final_anio;
            $array_sumas["cambio_deuda_pendiente"] += (float)$finanza->cambio_deuda_pendiente;
            $array_sumas["flujo_caja_libre_capital"] += (float)$finanza->flujo_caja_libre_capital;
            $array_sumas["recaudacion_fondos_futura"] += (float)$finanza->recaudacion_fondos_futura;
            $array_sumas["flujo_caja_libre"] += (float)$finanza->flujo_caja_libre;
        }

        $array_medias["ganancia"] = $array_sumas["ganancia"] / count($finanzas);
        $array_medias["costo_bienes_vendidos"] = $array_sumas["costo_bienes_vendidos"] / count($finanzas);
        $array_medias["salarios"] = $array_sumas["salarios"] / count($finanzas);
        $array_medias["otros_gastos_operativos"] = $array_sumas["otros_gastos_operativos"] / count($finanzas);
        $array_medias["ebitda"] = $array_sumas["ebitda"] / count($finanzas);
        $array_medias["da"] = $array_sumas["da"] / count($finanzas);
        $array_medias["ebit"] = $array_sumas["ebit"] / count($finanzas);
        $array_medias["interes"] = $array_sumas["interes"] / count($finanzas);
        $array_medias["impuestos"] = $array_sumas["impuestos"] / count($finanzas);
        $array_medias["beneficio_neto"] = $array_sumas["beneficio_neto"] / count($finanzas);
        $array_medias["cuentas_cobrar"] = $array_sumas["cuentas_cobrar"] / count($finanzas);
        $array_medias["inventario"] = $array_sumas["inventario"] / count($finanzas);
        $array_medias["cuentas_pagar"] = $array_sumas["cuentas_pagar"] / count($finanzas);
        $array_medias["capital_trabajo"] = $array_sumas["capital_trabajo"] / count($finanzas);
        $array_medias["cambio_capital_trabajo"] = $array_sumas["cambio_capital_trabajo"] / count($finanzas);
        $array_medias["gastos_capital"] = $array_sumas["gastos_capital"] / count($finanzas);
        $array_medias["deuda_final_anio"] = $array_sumas["deuda_final_anio"] / count($finanzas);
        $array_medias["cambio_deuda_pendiente"] = $array_sumas["cambio_deuda_pendiente"] / count($finanzas);
        $array_medias["flujo_caja_libre_capital"] = $array_sumas["flujo_caja_libre_capital"] / count($finanzas);
        $array_medias["recaudacion_fondos_futura"] = $array_sumas["recaudacion_fondos_futura"] / count($finanzas);
        $array_medias["flujo_caja_libre"] = $array_sumas["flujo_caja_libre"] / count($finanzas);

        return response()->JSON($array_medias);
    }
}
