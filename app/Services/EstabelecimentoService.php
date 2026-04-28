<?php

namespace App\Services;

use App\Models\Estabelecimento;

class EstabelecimentoService
{
    public function criarEstabelecimento(array $dados)
    {
        return Estabelecimento::create($dados);
    }
}