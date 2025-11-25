<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'endereco',
        'data_nascimento',
        'observacoes',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    // public function alugueis()
    // {
    //     return $this->hasMany(Aluguel::class);
    // }
}
