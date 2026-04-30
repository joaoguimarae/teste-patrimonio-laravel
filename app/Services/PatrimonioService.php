<?php 

namespace App\Services;


use App\Models\Patrimonio;
use Carbon\Carbon;
use \App\Models\Emprestimo;

class PatrimonioService
{
    public function criarPatrimonio(array $dados)
    {
        return Patrimonio::create($dados);
    }

    public function darBaixa(Patrimonio $patrimonio, string $motivo){

        $patrimonio->data_baixa= Carbon::today();
        $patrimonio->motivo_baixa= $motivo;

        $emprestimoAtivo = Emprestimo::where('patrimonio_id', $patrimonio->id)->latest()
        ->first();

        if ($emprestimoAtivo) {
        $emprestimoAtivo->data_devolucao = Carbon::today();
        $emprestimoAtivo->save();
        }
        

        return $patrimonio->save();
    }
}


?>