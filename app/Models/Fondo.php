<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
    use HasFactory;

    protected $fillable = [
        "empresa_id",
        "producto",
        "p_producto",
        "venta_marketing",
        "p_venta_marketing",
        "inventario",
        "p_inventario",
        "operacion",
        "p_operacion",
        "gastos",
        "p_gastos",
        "otros",
        "p_otros",
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
