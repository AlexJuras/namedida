<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locacao extends Model
{
    /** @use HasFactory<\Database\Factories\LocacaoFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pessoa_id',
        'roupa_id',
        'data_locacao',
        'data_devolucao',
        'valor_total',
        'estado',
        'observacoes',
    ];

    protected $casts = [
        'data_locacao' => 'date',
        'data_devolucao' => 'date',
        'valor_total' => 'decimal:2',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function roupa()
    {
        return $this->belongsTo(Roupa::class);
    }

    public function roupas()
    {
        return $this->belongsToMany(Roupa::class);
    }
}
