<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
}
