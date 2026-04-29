<?php

namespace App\Services;

use App\Models\Emprestimo;

class EmprestimoService
{
    public function realizarEmprestimo(array $dados)
    {
        return Emprestimo::create($dados);
    }
}

?>