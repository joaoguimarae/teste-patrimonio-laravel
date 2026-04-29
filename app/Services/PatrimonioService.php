<?php 

namespace App\Services;


use App\Models\Patrimonio;
use Carbon\Carbon;

class PatrimonioService
{
    public function criarPatrimonio(array $dados)
    {
        return Patrimonio::create($dados);
    }

    public function darBaixa(Patrimonio $patrimonio, string $motivo){

        $patrimonio->data_baixa= Carbon::today();
        $patrimonio->motivo_baixa= $motivo;

        return $patrimonio->save();
    }
}


?>