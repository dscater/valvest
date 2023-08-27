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
    ];

    public function accionistas()
    {
        return $this->hasMany(Accionista::class, 'empresa_id');
    }
    public function competidores()
    {
        return $this->hasMany(Competidor::class, 'empresa_id');
    }
}
