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

    protected $appends = ["total_fondo", "total_fondos_txt"];

    public function getTotalFondoAttribute()
    {
        $total = (float)$this->producto + (float)$this->venta_marketing + (float)$this->inventario + (float)$this->operacion + (float)$this->gastos + (float)$this->otros;
        return $total;
    }

    public function getTotalFondosTxtAttribute()
    {
        $total = (float)$this->producto + (float)$this->venta_marketing + (float)$this->inventario + (float)$this->operacion + (float)$this->gastos + (float)$this->otros;
        if ($total > 0) {
            $valor = $total;
            $simbolo = "K";
            if ($valor <= 999999) {
                $valor = (int)($valor / 1000);
            } elseif ($valor <= 9999999999) {
                $valor = ($valor / 1000000);
                $simbolo = "M";
            }
            return $valor . $simbolo;
        }

        return "0.00";
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
