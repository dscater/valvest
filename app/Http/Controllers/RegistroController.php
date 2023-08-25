<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function registro()
    {
        return view("registro");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|min:4',
                'paterno' => 'required|min:4',
                'ci' => 'required|numeric|digits_between:4, 20|unique:users,ci',
                'ci_exp' => 'required',
                'correo' => 'required|email|unique:users,correo',
                'fono' => 'required',
                'dir' => 'required',
                'password' => 'required|string|min:8|confirmed'
            ],
            [
                'nombre.required' => 'Este campo es obligatorio',
                'nombre.min' => 'Debes ingressar al menos 4 carácteres',
                'paterno.required' => 'Este campo es obligatorio',
                'paterno.min' => 'Debes ingresar al menos 4 carácteres',
                'ci.required' => 'Este campo es obligatorio',
                'ci.numeric' => 'Debes ingresar un valor númerico',
                'ci.unique' => 'Este número de C.I. ya fue registrado',
                'ci_exp.required' => 'Este campo es obligatorio',
                'dir.required' => 'Este campo es obligatorio',
                'dir.min' => 'Debes ingresar al menos 4 carácteres',
                'fono.required' => 'Este campo es obligatorio',
                'tipo.required' => 'Este campo es obligatorio',
            ]
        );

        $aux_pass = $request->password;
        $request['fecha_registro'] = date('Y-m-d');
        $request['usuario'] = $request->correo;
        $request['acceso'] = 1;
        $request['configuracion'] = 0;
        DB::beginTransaction();
        try {
            // crear el Usuario
            $nuevo_usuario = User::create(array_map('mb_strtoupper', $request->except('foto')));
            $nuevo_usuario->password = Hash::make($aux_pass);
            $nuevo_usuario->usuario = mb_strtolower($nuevo_usuario->usuario);
            $nuevo_usuario->correo = mb_strtolower($nuevo_usuario->correo);
            $nuevo_usuario->save();
            $nuevo_usuario->foto = 'default.png';
            if ($request->hasFile('foto')) {
                $file = $request->foto;
                $nom_foto = time() . '_' . $nuevo_usuario->usuario . '.' . $file->getClientOriginalExtension();
                $nuevo_usuario->foto = $nom_foto;
                $file->move(public_path() . '/imgs/users/', $nom_foto);
            }
            $nuevo_usuario->correo = mb_strtolower($nuevo_usuario->correo);
            $nuevo_usuario->save();
            Auth::login($nuevo_usuario);
            DB::commit();
            return response()->JSON([
                'sw' => true,
                'user' => $nuevo_usuario,
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
