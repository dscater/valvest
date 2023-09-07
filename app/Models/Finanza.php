<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

    public static function actualizaSumasFinanza(Finanza $finanza)
    {
        // EBITDA
        $finanza->ebitda = ((float)$finanza->ganancia ? $finanza->ganancia : 0) - ((float)$finanza->costo_bienes_vendidos ? $finanza->costo_bienes_vendidos : 0) - ((float)$finanza->salarios ? $finanza->salarios : 0) - ((float)$finanza->otros_gastos_operativos ? $finanza->otros_gastos_operativos : 0);

        // EBIT
        $finanza->ebit = ((float)$finanza->ebitda ? $finanza->ebitda : 0) - ((float)$finanza->da ? $finanza->da : 0);

        // BENEFICIO NETO
        $finanza->beneficio_neto = ((float)$finanza->ebit ? $finanza->ebit : 0) - ((float)$finanza->interes ? $finanza->interes : 0) - ((float)$finanza->impuestos ? $finanza->impuestos : 0);

        // CAPITAL TRABAJO
        $finanza->capital_trabajo = ((float)$finanza->cuentas_cobrar ? $finanza->cuentas_cobrar : 0) + ((float)$finanza->inventario ? $finanza->inventario : 0) - ((float)$finanza->cuentas_pagar ? $finanza->cuentas_pagar : 0);

        // CAMBIO CAPITAL TRABAJO
        $anterior = Finanza::where("empresa_id", $finanza->empresa_id)
            ->where("id", "<", $finanza->id)
            ->orderBy("id", "asc")
            ->get()->last();
        $finanza->cambio_capital_trabajo = null;
        if ($anterior) {
            $finanza->cambio_capital_trabajo = ((float)$finanza->capital_trabajo  ? $finanza->capital_trabajo  : 0) - ((float)$anterior->capital_trabajo ? $anterior->capital_trabajo : 0);
        }

        // CAMBIO DEUDA PENDIENTE
        $anterior = Finanza::where("empresa_id", $finanza->empresa_id)
            ->where("id", "<", $finanza->id)
            ->orderBy("id", "asc")
            ->get()->last();
        $finanza->cambio_deuda_pendiente = null;
        if ($anterior) {
            $finanza->cambio_deuda_pendiente = ((float)$finanza->deuda_final_anio  ? $finanza->deuda_final_anio  : 0) - ((float)$anterior->deuda_final_anio ? $anterior->deuda_final_anio : 0);
        }

        // FLUJO CAJA LIBRE CAPITAL
        $finanza->flujo_caja_libre_capital = ((float)$finanza->beneficio_neto ? $finanza->beneficio_neto : 0) + ((float)$finanza->da ? $finanza->da : 0) - ((float)$finanza->cambio_capital_trabajo ? $finanza->cambio_capital_trabajo : 0) - ((float)$finanza->gastos_capital ? $finanza->gastos_capital : 0) + ((float)$finanza->cambio_deuda_pendiente ? $finanza->cambio_deuda_pendiente : 0);

        // FLUJO CAJA LIBRE
        $finanza->flujo_caja_libre = ((float)$finanza->flujo_caja_libre_capital ? $finanza->flujo_caja_libre_capital : 0) + ((float)$finanza->recaudacion_fondos_futura ? $finanza->recaudacion_fondos_futura : 0);

        $finanza->save();
        return $finanza;
    }
}
