<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\HistorialAccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CuestionarioController extends Controller
{
    public $validacion = [
        'cuestionario' => 'required',
        'cuestionario.0' => 'required|numeric|min:1',
        'cuestionario.1' => 'required|numeric|min:1',
        'cuestionario.5' => 'required|numeric|min:1',
        'cuestionario.7' => 'required|numeric|min:1',
        'cuestionario.18' => 'required',
        'cuestionario.22' => 'required|numeric|min:1',
        'cuestionario.23' => 'required|numeric|min:1',
        'cuestionario.33' => 'required|numeric|min:1',
    ];

    public $mensajes = [
        'cuestionario.0.required' => 'La respuesta de la pregunta 1 es obligatorio',
        'cuestionario.0.numeric' => 'La respuesta de la pregunta 1 debe ser un campo númerico',
        'cuestionario.0.min' => 'La respuesta de la pregunta 1 debe tener un valor mínimo de :min',
        'cuestionario.1.required' => 'La respuesta de la pregunta 2 es obligatorio',
        'cuestionario.1.numeric' => 'La respuesta de la pregunta 2 debe ser un campo númerico',
        'cuestionario.1.min' => 'La respuesta de la pregunta 2 debe tener un valor mínimo de :min',
        'cuestionario.5.required' => 'La respuesta de la pregunta 6 es obligatorio',
        'cuestionario.5.numeric' => 'La respuesta de la pregunta 6 debe ser un campo númerico',
        'cuestionario.5.min' => 'La respuesta de la pregunta 6 debe tener un valor mínimo de :min',
        'cuestionario.7.required' => 'La respuesta de la pregunta 8 es obligatorio',
        'cuestionario.7.numeric' => 'La respuesta de la pregunta 8 debe ser un campo númerico',
        'cuestionario.7.min' => 'La respuesta de la pregunta 8 debe tener un valor mínimo de :min',
        'cuestionario.18.required' => 'La respuesta de la pregunta 19 es obligatorio',
        'cuestionario.22.required' => 'La respuesta de la pregunta 23 es obligatorio',
        'cuestionario.22.numeric' => 'La respuesta de la pregunta 23 debe ser un campo númerico',
        'cuestionario.22.min' => 'La respuesta de la pregunta 23 debe tener un valor mínimo de :min',
        'cuestionario.23.required' => 'La respuesta de la pregunta 24 es obligatorio',
        'cuestionario.23.numeric' => 'La respuesta de la pregunta 24 debe ser un campo númerico',
        'cuestionario.23.min' => 'La respuesta de la pregunta 24 debe tener un valor mínimo de :min',
        'cuestionario.33.required' => 'La respuesta de la pregunta 34 es obligatorio',
        'cuestionario.33.numeric' => 'La respuesta de la pregunta 34 debe ser un campo númerico',
        'cuestionario.33.min' => 'La respuesta de la pregunta 34 debe tener un valor mínimo de :min',
    ];

    public function store(Request $request)
    {
        $request->validate($this->validacion, $this->mensajes);
        DB::beginTransaction();
        try {
            $aux = $request->cuestionario;
            $request["cuestionario"] = "vacio";
            $nuevo_cuestionario = Cuestionario::create($request->all());

            $resultString = '';
            foreach ($aux as $item) {
                if (is_array($item)) {
                    $resultString .= implode(';', $item) . '|';
                } else {
                    $resultString .= $item . '|';
                }
            }
            $resultString = rtrim($resultString, '|');
            $nuevo_cuestionario->cuestionario = $resultString;
            $nuevo_cuestionario->save();

            $datos_original = HistorialAccion::getDetalleRegistro($nuevo_cuestionario, "cuestionarios");
            HistorialAccion::create([
                'user_id' => Auth::user()->id,
                'accion' => 'CREACIÓN',
                'descripcion' => 'EL USUARIO ' . Auth::user()->usuario . ' REGISTRO EL CUESTIONARIO DE LA EMPRESA ' . $nuevo_cuestionario->empresa->nombre,
                'datos_original' => $datos_original,
                'modulo' => 'CUESTIONARIOS',
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
    public function update(Cuestionario $cuestionario, Request $request)
    {
        $request->validate($this->validacion, $this->mensajes);
        DB::beginTransaction();
        try {
            $aux = $request->cuestionario;
            $request["cuestionario"] = "vacio";
            $datos_original = HistorialAccion::getDetalleRegistro($cuestionario, "cuestionarios");
            $cuestionario->update($request->all());
            $resultString = '';
            foreach ($aux as $item) {
                if (is_array($item)) {
                    $resultString .= implode(';', $item) . '|';
                } else {
                    $resultString .= $item . '|';
                }
            }
            $resultString = rtrim($resultString, '|');
            $cuestionario->cuestionario = $resultString;
            $cuestionario->save();

            $datos_original = HistorialAccion::getDetalleRegistro($cuestionario, "cuestionarios");
            HistorialAccion::create([
                'user_id' => Auth::user()->id,
                'accion' => 'CREACIÓN',
                'descripcion' => 'EL USUARIO ' . Auth::user()->usuario . ' ACTUALIZÓ EL CUESTIONARIO DE LA EMPRESA ' . $cuestionario->empresa->nombre,
                'datos_original' => $datos_original,
                'modulo' => 'CUESTIONARIOS',
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
