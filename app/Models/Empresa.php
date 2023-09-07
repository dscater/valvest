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

    protected $appends = ["primera_finanza", "valor_fondo", "valor_fondo_k"];

    public function getPrimeraFinanzaAttribute()
    {
        $finanza = Finanza::where("empresa_id", $this->id)->orderBy("id", "asc")->get()->first();
        return $finanza;
    }

    public function getValorFondoAttribute()
    {
        $recaudacion_fondo = Finanza::where("empresa_id", $this->id)
            ->where("recaudacion_fondos_futura", ">", 0)
            ->where("recaudacion_fondos_futura", "!=", null)
            ->get()->last();
        if ($recaudacion_fondo) {
            return $recaudacion_fondo->recaudacion_fondos_futura;
        }
        return 0;
    }


    public function getValorFondoKAttribute()
    {
        $recaudacion_fondo = Finanza::where("empresa_id", $this->id)
            ->where("recaudacion_fondos_futura", ">", 0)
            ->where("recaudacion_fondos_futura", "!=", null)
            ->get()->last();
        if ($recaudacion_fondo) {

            $valor = $recaudacion_fondo->recaudacion_fondos_futura;
            $simbolo = "K";
            if ($valor <= 999999) {
                $valor = (int)($valor / 1000);
            } elseif ($valor <= 9999999999) {
                $valor = ($valor / 1000000);
                $simbolo = "M";
            }
            return $valor . $simbolo;
        }
        return 0;
    }

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

    public function valoracion()
    {
        return $this->hasOne(Valoracion::class, 'empresa_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
