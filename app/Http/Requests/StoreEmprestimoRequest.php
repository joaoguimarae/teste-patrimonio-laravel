<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmprestimoRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'patrimonio_id' => 'required|exists:patrimonios,id',
        'estabelecimento_requerente_id' => 'required|exists:estabelecimentos,id',
        'data_emprestimo' => 'required|date',
    ];
}
}
