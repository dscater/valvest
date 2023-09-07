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
        "valuacion",
        "ultimo_ebitda"
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public static function getValorCuestionario(Empresa $empresa)
    {
        $valores = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $array_cuestionario = $empresa->cuestionario->array_cuestionario;
        // 1: > 3 = 6:1
        $valores[0] = 1;
        if ($array_cuestionario[0] >= 3) {
            $valores[0] = 6;
        }
        // 2: > 100k = 8:3
        $valores[1] = 3;
        if ($array_cuestionario[1] >= 100000) {
            $valores[1] = 8;
        }
        // 3: SI = 7:2
        $valores[2] = 7;
        if ($array_cuestionario[2] == 3) {
            $valores[2] = 2;
        }
        // 4: >35 = 5:1
        $valores[3] = 1;
        if ($array_cuestionario[3] > 1) {
            $valores[3] = 5;
        }
        // 5: SI = 9:4
        $valores[4] = 4;
        if ($array_cuestionario[4] > 0) {
            $valores[4] = 9;
        }
        // 6: >20 = 6:1
        $valores[5] = 1;
        if ($array_cuestionario[5] >= 20) {
            $valores[5] = 6;
        }
        // 7: >5 = 8:3
        $valores[6] = 3;
        if ($array_cuestionario[6] > 2) {
            $valores[6] = 8;
        }
        // 8: >5 = 9:4
        $valores[7] = 4;
        if ($array_cuestionario[7] >= 5) {
            $valores[7] = 9;
        }
        // 9: >=1 = 8:3
        $valores[8] = 3;
        if ($array_cuestionario[8] > 0) {
            $valores[8] = 8;
        }
        // 10: SI = 9:4
        $valores[9] = 4;
        if ($array_cuestionario[9] > 3) {
            $valores[9] = 9;
        }
        // 11: SI = 9:4
        $valores[10] = 4;
        if ($array_cuestionario[10] == 0) {
            $valores[10] = 9;
        }
        // 12: EAE = 6:1
        $valores[11] = 1;
        if ($array_cuestionario[11] == 1) {
            $valores[11] = 6;
        }
        // 13: EXP = 7:2
        $valores[12] = 2;
        if ($array_cuestionario[12] == 3) {
            $valores[12] = 7;
        }
        // 14: SI = 8:3
        $valores[13] = 3;
        if ($array_cuestionario[13] == 0) {
            $valores[13] = 8;
        }
        // 15: SI = 7:2
        $valores[14] = 2;
        if ($array_cuestionario[14] == 0) {
            $valores[14] = 7;
        }
        // 16: >=1 = 8:1
        $valores[15] = 1;
        if ($array_cuestionario[15] >= 1) {
            $valores[15] = 8;
        }
        // 17: SI CR Y AN = 7:2
        $valores[16] = 2;
        if ($array_cuestionario[16] > 2) {
            $valores[16] = 7;
        }
        // 18: SI TMOS Y GEDGIVCA = 8:3
        $valores[17] = 3;
        if ($array_cuestionario[17] == 2 || $array_cuestionario[17] == 4) {
            $valores[17] = 8;
        }
        // 19: SI BOLIVIA= 2:7
        $valores[18] = 7;
        if (mb_strtoupper($array_cuestionario[18]) == "BOLIVIA") {
            $valores[18] = 2;
        }
        // 20: SI RM, BI, SIC, PCC, SCC, AB, SBI, BR, FIM, ET = 8:3
        $valores[19] = 3;
        if ($array_cuestionario[19][0] == 4 || $array_cuestionario[19][0] == 6 || $array_cuestionario[19][0] == 7 || $array_cuestionario[19][0] == 12 || $array_cuestionario[19][0] == 14 || $array_cuestionario[19][0] == 17 || $array_cuestionario[19][0] == 19 || $array_cuestionario[19][0] == 23 || $array_cuestionario[19][0] == 24) {
            $valores[19] = 8;
        }
        // 21: SI MVP, M =9:4
        $valores[20] = 4;
        if ($array_cuestionario[20] > 1) {
            $valores[20] = 9;
        }
        // 22: SI =7:2
        $valores[21] = 2;
        if ($array_cuestionario[21] > 0) {
            $valores[21] = 7;
        }
        // 23: >100K =9:4
        $valores[22] = 4;
        if ($array_cuestionario[22] >= 100000) {
            $valores[22] = 9;
        }
        // 24: >50% =9:4
        $valores[23] = 4;
        if ($array_cuestionario[23] >= 50) {
            $valores[23] = 9;
        }
        // 25: >ALTO =8:3
        $valores[24] = 3;
        if ($array_cuestionario[24] > 2) {
            $valores[24] = 8;
        }
        // 26: SI OA =7:2
        $valores[25] = 2;
        if ($array_cuestionario[25] > 3) {
            $valores[25] = 7;
        }
        // 27: >BIEN =3:8
        $valores[26] = 3;
        if ($array_cuestionario[26] > 0) {
            $valores[26] = 8;
        }
        // 28: SI CITPM =7:2
        $valores[27] = 2;
        if ($array_cuestionario[27] == 1) {
            $valores[27] = 7;
        }
        // 29: SI CENED =8:3
        $valores[28] = 3;
        if ($array_cuestionario[28] > 1) {
            $valores[28] = 8;
        }
        // 30: SI NPFEEG =7:2
        $valores[29] = 2;
        if ($array_cuestionario[29] > 3) {
            $valores[29] = 8;
        }
        // 31: >BP =6:1
        $valores[30] = 1;
        if ($array_cuestionario[30] > 1) {
            $valores[30] = 6;
        }
        // 32: >RP =8:3
        $valores[31] = 3;
        if ($array_cuestionario[31] > 1) {
            $valores[31] = 8;
        }
        // 33: >CF =8:3
        $valores[32] = 3;
        if ($array_cuestionario[32] > 2) {
            $valores[32] = 8;
        }
        // 34: <5AÑOS DEL ACTUAL=3:8
        $anio_actual = date("Y");
        $anio_inicio = $array_cuestionario[33];
        $diff_anios = (int)$anio_actual - $anio_inicio;
        $valores[33] = 8;
        if ($diff_anios <= 5) {
            $valores[33] = 3;
        }
        // 35: SI =9:4
        $valores[34] = 4;
        if ($array_cuestionario[34] == 0) {
            $valores[34] = 9;
        }
        // 36: <5AÑOS DEL ACTUAL =3:8
        $anio_actual = date("Y");
        $anio_incorporacion = $array_cuestionario[35] ? $array_cuestionario[35] : 0;
        $diff_anios = (int)$anio_actual - $anio_incorporacion;
        $valores[35] = 8;
        if ($anio_incorporacion == 0 || $diff_anios <= 5) {
            $valores[35] = 3;
        }
        // 37: SI =9:4
        $valores[36] = 4;
        if ($array_cuestionario[36] == 0) {
            $valores[36] = 9;
        }
        // 38: SI NNA =4:9
        $valores[37] = 9;
        if ($array_cuestionario[37] > 3) {
            $valores[37] = 4;
        }
        // 39: SI NA =2:7
        $valores[38] = 7;
        if ($array_cuestionario[38] == 0) {
            $valores[38] = 2;
        }

        $sumatoria = 0;
        foreach ($valores as $val) {
            $sumatoria += (float)$val;
        }

        $res = $sumatoria / 4;
        $res = $res / 10;
        return (int)$res;
    }

    public static function getValuacion(Empresa $empresa)
    {
        $finanzas = Finanza::where("empresa_id", $empresa->id)
            ->where("flujo_caja_libre", ">", 0)
            ->where("flujo_caja_libre", "!=", null)
            ->orderBy("id", "asc")
            ->get();

        $valuacion = 0;
        foreach ($finanzas as $f) {
            $valuacion += (float)$f->flujo_caja_libre;
        }

        return $valuacion;
    }
}
