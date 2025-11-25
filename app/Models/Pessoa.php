<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    /** @use HasFactory<\Database\Factories\PessoaFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'sexo',
        'busto',
        'cintura',
        'quadril',
        'altura',
        'ombro',
        'comprimento_vestido',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'busto' => 'decimal:2',
        'cintura' => 'decimal:2',
        'quadril' => 'decimal:2',
        'altura' => 'decimal:2',
        'ombro' => 'decimal:2',
        'comprimento_vestido' => 'decimal:2',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
