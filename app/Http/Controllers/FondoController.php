<?php

namespace App\Http\Controllers;

use App\Models\Fondo;
use App\Models\HistorialAccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FondoController extends Controller
{
    public $validacion = [
        "empresa_id" => "required",
        "producto" => "required|numeric|min:0",
        "p_producto" => "required|numeric|min:0",
        "venta_marketing" => "required|numeric|min:0",
        "p_venta_marketing" => "required|numeric|min:0",
        "inventario" => "required|numeric|min:0",
        "p_inventario" => "required|numeric|min:0",
        "operacion" => "required|numeric|min:0",
        "p_operacion" => "required|numeric|min:0",
        "gastos" => "required|numeric|min:0",
        "p_gastos" => "required|numeric|min:0",
        "otros" => "required|numeric|min:0",
        "p_otros" => "required|numeric|min:0",
    ];

    public $mensajes = [
        "empresa_id.required" => "",
        "producto.required" => "Debes indicar el monto de la sección Producto e I+D",
        "p_producto.required" => "Debes indicar el porcentaje de la sección Producto e I+D",
        "venta_marketing.required" => "Debes indicar el monto de la sección Ventas y marketing",
        "p_venta_marketing.required" => "Debes indicar el porcentaje de la sección Ventas y marketing",
        "inventario.required" => "Debes indicar el monto de la sección Inventario",
        "p_inventario.required" => "Debes indicar el porcentaje de la sección Inventario",
        "operacion.required" => "Debes indicar el monto de la sección Operaciones",
        "p_operacion.required" => "Debes indicar el porcentaje de la sección Operaciones",
        "gastos.required" => "Debes indicar el monto de la sección Los gastos de capital",
        "p_gastos.required" => "Debes indicar el porcentaje de la sección Los gastos de capital",
        "otros.required" => "Debes indicar el monto de la sección Otros",
        "p_otros.required" => "Debes indicar el porcentaje de la sección Otros",
    ];
    public function store(Request $request)
    {
        $request->validate($this->validacion, $this->mensajes);
        DB::beginTransaction();
        try {
            $nuevo_fondo = Fondo::create($request->all());
            $datos_original = HistorialAccion::getDetalleRegistro($nuevo_fondo, "fondos");
            HistorialAccion::create([
                'user_id' => Auth::user()->id,
                'accion' => 'CREACIÓN',
                'descripcion' => 'EL USUARIO ' . Auth::user()->usuario . ' REGISTRO LOS FONDOS DE LA EMPRESA ' . $nuevo_fondo->empresa->nombre,
                'datos_original' => $datos_original,
                'modulo' => 'FONDOS',
                'fecha' => date('Y-m-d'),
                'hora' => date('H:i:s')
            ]);

            DB::commit();
            return response()->JSON([
                'sw' => true,
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
    public function update(Fondo $fondo, Request $request)
    {
        $request->validate($this->validacion, $this->mensajes);
        DB::beginTransaction();
        try {
            $datos_original = HistorialAccion::getDetalleRegistro($fondo, "fondos");
            $fondo->update($request->all());
            $datos_original = HistorialAccion::getDetalleRegistro($fondo, "fondos");
            HistorialAccion::create([
                'user_id' => Auth::user()->id,
                'accion' => 'CREACIÓN',
                'descripcion' => 'EL USUARIO ' . Auth::user()->usuario . ' ACTUALIZÓ LOS FONDOS DE LA EMPRESA ' . $fondo->empresa->nombre,
                'datos_original' => $datos_original,
                'modulo' => 'FONDOS',
                'fecha' => date('Y-m-d'),
                'hora' => date('H:i:s')
            ]);

            DB::commit();
            return response()->JSON([
                'sw' => true,
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
