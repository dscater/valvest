<?php

namespace App\Http\Controllers;

use App\Models\Accionista;
use App\Models\Competidor;
use App\Models\Empresa;
use App\Models\HistorialAccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    public $validacion = [
        'nombre' => 'required|min:2',
        "descripcion_actividad" => "required|min:2",
        "correo" => "required|email",
        "dir" => "required|min:2",
        "accionistas" => "required|array|min:1",
        "competidores" => "required|array|min:1",
    ];

    public $mensajes = [];

    public function index(Request $request)
    {
        if (Auth::user()->tipo == 'ADMINISTRADOR' && Auth::user()->configuracion == 1) {
            $empresas = Empresa::with(["accionistas", "competidores"])->get();
        } else {
            $empresas = Empresa::with(["accionistas", "competidores"])->where("user_id", Auth::user()->id)->get();
        }
        return response()->JSON(['empresas' => $empresas, 'total' => count($empresas)], 200);
    }

    public function store(Request $request)
    {
        $request->validate($this->validacion, $this->mensajes);

        DB::beginTransaction();
        try {
            // crear Empresa
            $request["fecha_registro"] = date("Y-m-d");
            $request["user_id"] = Auth::user()->id;
            $nueva_empresa = Empresa::create(array_map('mb_strtoupper', $request->except("accionistas", "competidores")));
            $accionistas = $request->accionistas;
            $competidores = $request->competidores;

            foreach ($accionistas as $a) {
                $nueva_empresa->accionistas()->create(array_map('mb_strtoupper', $a));
            }

            foreach ($competidores as $c) {
                $nueva_empresa->competidores()->create(array_map('mb_strtoupper', $c));
            }

            $datos_original = HistorialAccion::getDetalleRegistro($nueva_empresa, "empresas");
            HistorialAccion::create([
                'user_id' => Auth::user()->id,
                'accion' => 'CREACIÓN',
                'descripcion' => 'EL USUARIO ' . Auth::user()->usuario . ' REGISTRO UNA EMPRESA',
                'datos_original' => $datos_original,
                'modulo' => 'EMPRESAS',
                'fecha' => date('Y-m-d'),
                'hora' => date('H:i:s')
            ]);

            DB::commit();
            return response()->JSON([
                'sw' => true,
                'empresa' => $nueva_empresa,
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

    public function update(Request $request, Empresa $empresa)
    {
        $request->validate($this->validacion, $this->mensajes);

        DB::beginTransaction();
        try {
            $datos_original = HistorialAccion::getDetalleRegistro($empresa, "empresas");
            $empresa->update(array_map('mb_strtoupper', $request->except("accionistas", "competidores", "accionistas_eliminados", "competidores_eliminados")));
            $accionistas = $request->accionistas;
            $accionistas_eliminados = $request->accionistas_eliminados;
            $competidores = $request->competidores;
            $competidores_eliminados = $request->competidores_eliminados;

            foreach ($accionistas as $a) {
                if ($a["id"] == 0) {
                    $empresa->accionistas()->create(array_map('mb_strtoupper', $a));
                } else {
                    $accionista = Accionista::find($a["id"]);
                    $accionista->update(array_map('mb_strtoupper', $a));
                }
            }

            foreach ($competidores as $c) {
                if ($c["id"] == 0) {
                    $empresa->competidores()->create(array_map('mb_strtoupper', $c));
                } else {
                    $competidor = Competidor::find($c["id"]);
                    $competidor->update(array_map('mb_strtoupper', $c));
                }
            }

            if (isset($accionistas_eliminados)) {
                foreach ($accionistas_eliminados as $ae) {
                    $accionista = Accionista::find($ae);
                    $accionista->delete();
                }
            }
            if (isset($competidores_eliminados)) {
                foreach ($competidores_eliminados as $ce) {
                    $competidor = Competidor::find($ce);
                    $competidor->delete();
                }
            }
            $datos_nueva = HistorialAccion::getDetalleRegistro($empresa, "empresas");
            HistorialAccion::create([
                'user_id' => Auth::user()->id,
                'accion' => 'MODIFICACIÓN',
                'descripcion' => 'EL USUARIO ' . Auth::user()->usuario . ' MODIFICÓ UNA EMPRESA',
                'datos_original' => $datos_original,
                'datos_nueva' => $datos_nueva,
                'modulo' => 'EMPRESAS',
                'fecha' => date('Y-m-d'),
                'hora' => date('H:i:s')
            ]);

            DB::commit();
            return response()->JSON([
                'sw' => true,
                'empresa' => $empresa,
                'msj' => 'El registro se actualizó de forma correcta'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->JSON([
                'sw' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(Empresa $empresa)
    {
        return response()->JSON([
            'sw' => true,
            'empresa' => $empresa->load("accionistas", "competidores", "cuestionario")
        ], 200);
    }

    public function destroy(Empresa $empresa)
    {
        DB::beginTransaction();
        try {
            // $existe = Modelo::where("empresa_id", $empresa->id)->get();
            // if (count($existe) > 0) {
            //     throw new Exception('No es posible eliminar el registro debido a que existen registros que lo utilizan');
            // }

            $datos_original = HistorialAccion::getDetalleRegistro($empresa, "empresas");
            $empresa->accionistas()->delete();
            $empresa->competidores()->delete();
            $empresa->delete();
            HistorialAccion::create([
                'user_id' => Auth::user()->id,
                'accion' => 'ELIMINACIÓN',
                'descripcion' => 'EL USUARIO ' . Auth::user()->usuario . ' ELIMINÓ UNA EMPRESA',
                'datos_original' => $datos_original,
                'modulo' => 'EMPRESAS',
                'fecha' => date('Y-m-d'),
                'hora' => date('H:i:s')
            ]);
            DB::commit();
            return response()->JSON([
                'sw' => true,
                'msj' => 'El registro se eliminó correctamente'
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
