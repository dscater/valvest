<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competidor extends Model
{
    use HasFactory;

    protected $table = "competidores";

    protected $fillable = [
        "empresa_id",
        "nombre",
        "web",
    ];
}
