<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "descripcion_actividad",
        "web",
        "correo",
        "dir",
        "fecha_registro",
        "user_id"
    ];

    public function accionistas()
    {
        return $this->hasMany(Accionista::class, 'empresa_id');
    }

    public function competidores()
    {
        return $this->hasMany(Competidor::class, 'empresa_id');
    }

    public function cuestionario()
    {
        return $this->hasOne(Cuestionario::class, 'empresa_id');
    }

    public function fondo()
    {
        return $this->hasOne(Fondo::class, 'empresa_id');
    }

    public function finanzas()
    {
        return $this->hasMany(Finanza::class, 'empresa_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
