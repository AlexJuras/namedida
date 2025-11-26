<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roupa extends Model
{
    /** @use HasFactory<\Database\Factories\RoupaFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [ 
        'codigo',
        'tipo',
        'tamanho',
        'cor',
        'material',
        'marca',
        'preco',
        'estado',
        'observacoes',
    ];

    public function locacaos()
    {
        return $this->belongsToMany(Locacao::class);
    }
}
