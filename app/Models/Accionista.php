<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accionista extends Model
{
    use HasFactory;

    protected $fillable = [
        "empresa_id",
        "nombre",
        "porcentaje",
    ];
}
