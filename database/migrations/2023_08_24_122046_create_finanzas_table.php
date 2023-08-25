<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finanzas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("empresa_id");
            $table->decimal("ganancia", 24, 2);
            $table->decimal("costo_bienes_vendidos", 24, 2);
            $table->decimal("salarios", 24, 2);
            $table->decimal("otros_gastos_operativos", 24, 2);
            $table->decimal("ebitda", 24, 2);
            $table->decimal("da", 24, 2);
            $table->decimal("ebit", 24, 2);
            $table->decimal("interes", 24, 2);
            $table->decimal("impuestos", 24, 2);
            $table->decimal("beneficio_neto", 24, 2);
            $table->decimal("cuentas_cobrar", 24, 2);
            $table->decimal("inventario", 24, 2);
            $table->decimal("cuentas_pagar", 24, 2);
            $table->decimal("capital_trabajo", 24, 2);
            $table->decimal("cambio_capital_trabajo", 24, 2);
            $table->decimal("gastos_capital", 24, 2);
            $table->decimal("deuda_final_anio", 24, 2);
            $table->decimal("cambio_deuda_pendiente", 24, 2);
            $table->decimal("flujo_caja_libre_capital", 24, 2);
            $table->decimal("recaudacion_fondos_futura", 24, 2);
            $table->decimal("flujo_caja_libre", 24, 2);
            $table->timestamps();

            $table->foreign("empresa_id")->on("empresas")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finanzas');
    }
}
