<?php

namespace App\Services;

use App\Models\Emprestimo;
use App\Models\Estabelecimento;
use App\Models\Patrimonio;
use Exception;
use Carbon\Carbon;

class EmprestimoService
{
    public function realizarEmprestimo(array $dados)
    {
        $requerente= Estabelecimento:: findOrFail($dados['id_estabelecimento_request']);
        $atendente= Estabelecimento:: findOrFail($dados['id_esatabelimento_atendente']);
        $patrimonio= Patrimonio::findOrFail($dados['patrimonio_id']);

        if ($requerente->tipo !== $atendente->tipo){
            throw new Exception("Empréstimo negado, os agentes precisam ser do mesmo tipo");

        }
        if (!is_null($patrimonio->data_baixa)){
            throw new Exception("Emprestimo negado, este patrimônio já sofreu baixa");
        }

        $emprestimoAtivo = Emprestimo::where('patrimonio_id', $patrimonio->id)->whereNull('data_devolucao')->exists();
        if ($emprestimoAtivo ){

        throw new Exception("Emprestimo negado, o patrimônio esta emprestado neste momento");
        }

        if(!is_null($atendente->dias_max_emprestimo)){
            
            $dataInicial = Carbon::parse($dados['data_emprestimo']);
            $dados['data_devolucao']= $dataInicial->addDays($atendente->dias_max_emprestimo)->toDateString();
        }



        return Emprestimo::create($dados);
    }


}

?>