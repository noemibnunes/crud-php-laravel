<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusEnum;
use App\Enums\SexoEnum;

class Pessoa extends Model
{
    protected $fillable = [
        "nome", "idade", "sexo", "email", "cargo", "telefone", "status"
    ];

    protected $casts = [
        'status' => StatusEnum::class, 
        'sexo' => SexoEnum::class
    ];

}
