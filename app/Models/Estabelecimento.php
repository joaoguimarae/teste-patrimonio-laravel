<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    public const TIPOS = [  
        'Hospital','Banco','Laboratorio'
    ];
    protected $fillable = ['nome','cnpj','tipo','dias_max_emprestimo'];
}
