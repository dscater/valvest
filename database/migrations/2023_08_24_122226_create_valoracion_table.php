<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValoracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoracion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("empresa_id");
            $table->decimal("fondos", 24, 2);
            $table->decimal("valoracion_previa", 24, 2);
            $table->decimal("limite_bajo", 24, 2);
            $table->decimal("limite_alto", 24, 2);
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
        Schema::dropIfExists('valoracion');
    }
}
