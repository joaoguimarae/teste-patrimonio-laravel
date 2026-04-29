<?php

namespace App\Http\Requests;

use App\Models\Patrimonio;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StorePatrimonioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'nome'=>'required|string|max:255',
            'codigo'=>'required|string|uniique:patrimonios:codigo',
            'tipo'=>['required',Rule::in(Patrimonio::TIPOS_PERMITIDOS)],
            'data_enntrada'=>'required|date',
            'estabelecimento_id'=>'required|exists:estabelecimentos,id',
            'data_baixa'=>'nullable|date|after_or_equal:data_entrada',
            'motivo_baixa'=>'nullable|string|max:255',

        ];
    }
}
