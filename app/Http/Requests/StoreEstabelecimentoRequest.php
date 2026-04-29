<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Estabelecimento;


class StoreEstabelecimentoRequest extends FormRequest
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
            'nome' => 'requiried',
            'cnpj'=> 'required|unique:estabelecimentos',
            'tipo'=>['required', Rule::in(Estabelecimento::TIPOS)],
            'dias_max'=>'nullable|integer|min:1',
        ];
    }
}
