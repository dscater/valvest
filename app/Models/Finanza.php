<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finanza extends Model
{
    use HasFactory;

    protected $fillable = [
        "empresa_id",
        "gestion",
        "ganancia",
        "costo_bienes_vendidos",
        "salarios",
        "otros_gastos_operativos",
        "ebitda",
        "da",
        "ebit",
        "interes",
        "impuestos",
        "beneficio_neto",
        "cuentas_cobrar",
        "inventario",
        "cuentas_pagar",
        "capital_trabajo",
        "cambio_capital_trabajo",
        "gastos_capital",
        "deuda_final_anio",
        "cambio_deuda_pendiente",
        "flujo_caja_libre_capital",
        "recaudacion_fondos_futura",
        "flujo_caja_libre",
    ];

    protected $appends = ["enviando", "enviado"];

    public function getEnviandoAttribute()
    {
        return false;
    }

    public function getEnviadoAttribute()
    {
        return false;
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
