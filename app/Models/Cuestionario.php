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


    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
