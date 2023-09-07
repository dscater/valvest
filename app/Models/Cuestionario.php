<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;
    protected $fillable = [
        "empresa_id",
        "cuestionario",
    ];

    protected $appends = ["array_cuestionario"];

    public function getArrayCuestionarioAttribute()
    {
        $array = self::stringToArray($this->cuestionario);
        return $array;
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public static function stringToArray($inputString)
    {
        $parts = explode('|', $inputString);
        $result = [];

        foreach ($parts as $part) {
            $innerParts = explode(';', $part);
            if (count($innerParts) > 1) {
                $result[] = $innerParts;
            } else {
                $result[] = $part;
            }
        }

        return $result;
    }

    public static function infoRespuestas()
    {
        return [
            [

            ]
        ];
    }
}
