<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;

    protected $table = "valoracion";

    protected $fillable = [
        "empresa_id",
        "fondos",
        "valoracion_previa",
        "limite_bajo",
        "limite_alto",
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
