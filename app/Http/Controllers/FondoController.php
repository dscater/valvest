<?php

namespace App\Http\Controllers;

use App\Models\Fondo;
use App\Models\HistorialAccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FondoController extends Controller
{
    public $validacion = [];

    public $mensajes = [];
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
