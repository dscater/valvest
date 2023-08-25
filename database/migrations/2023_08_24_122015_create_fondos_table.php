<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fondos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("empresa_id");
            $table->decimal("producto", 24, 2);
            $table->double("p_producto", 8, 2);
            $table->decimal("venta_marketing", 24, 2);
            $table->double("p_venta_marketing", 8, 2);
            $table->decimal("inventario", 24, 2);
            $table->double("p_inventario", 8, 2);
            $table->decimal("operacion", 24, 2);
            $table->double("p_operacion", 8, 2);
            $table->decimal("gastos", 24, 2);
            $table->double("p_gastos", 8, 2);
            $table->decimal("otros", 24, 2);
            $table->double("p_otros", 8, 2);
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
        Schema::dropIfExists('fondos');
    }
}
