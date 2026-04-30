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
    $patrimonio = Patrimonio::findOrFail($dados['patrimonio_id']);
    $dados['estabelecimento_atendente_id'] = $patrimonio->estabelecimento_id;

    $requerente = Estabelecimento::findOrFail($dados['estabelecimento_requerente_id']);
    $atendente = Estabelecimento::findOrFail($dados['estabelecimento_atendente_id']);

    if ($requerente->id === $atendente->id) {
        
        throw \Illuminate\Validation\ValidationException::withMessages([
            'estabelecimento_requerente_id' => 'O destino não pode ser o mesmo que o dono do item.'
        ]);
    }
    if ($requerente->tipo !== $atendente->tipo){
        throw \Illuminate\Validation\ValidationException::withMessages([
            'estabelecimento_requerente_id' => 'Empréstimo negado: os agentes precisam ser do mesmo tipo.'
        ]);
    }

    if (!is_null($patrimonio->data_baixa)){
        throw \Illuminate\Validation\ValidationException::withMessages([
            'patrimonio_id' => 'Empréstimo negado: este patrimônio sofreu baixa e não pode ser usado.'
        ]);
    }

    $emprestimoAtivo = Emprestimo::where('patrimonio_id', $patrimonio->id)
        ->where(function ($query) use ($dados) {
           
            $query->whereNull('data_devolucao')
                  ->orWhere('data_devolucao', '>=', $dados['data_emprestimo']);
        })
        ->exists();

    if ($emprestimoAtivo) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'patrimonio_id' => 'Este item já está emprestado e ainda não retornou à base.'
        ]);
    }

    if(!is_null($atendente->dias_max_emprestimo)){
        $dataInicial = \Carbon\Carbon::parse($dados['data_emprestimo']);
        $dados['data_devolucao'] = $dataInicial->addDays($atendente->dias_max_emprestimo)->toDateString();
    }

    return Emprestimo::create($dados);
}


}

?>