<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientesRestaurante extends Model
{
    protected $table = "clientes_restaurante";
    
    protected $fillable = [
        'nome',
        'cidade',
        'estado',
        'endereco',
        'telefone',
        'data_nascimento',
    ];
}
