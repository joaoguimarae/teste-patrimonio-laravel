<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model
{
    public const TIPOS_PERMITIDOS=[
        'Próprio',
        'Alugado',
        'Emprestado'
    ];
    protected $fillable = ['nome','codigo','tipo','data_entrada','estabelecimento_id','data_baixa','motivo_baixa'];
}
