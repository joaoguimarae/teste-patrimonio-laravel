<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = [
        'estabelecimento_requerente_id',
        'estabelecimento_atendente_id',
        'patrimonio_id',
        'data_emprestimo',
        'data_devolucao'

    ];
    
    public function patrimonio(){
        return $this->belongsTo(Patrimonio::class);
    }
    public function requerente(){
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_requerente_id');
    }
    public function atendente(){
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_atendente_id');
    }
}
