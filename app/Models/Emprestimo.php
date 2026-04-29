<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = [
        'estabelecimento_requer_id',
        'estabelecimento_atendente_id',
        'patrimonio_id',
        'data_emprestimo',
        'data_devolucao'

    ];
}
