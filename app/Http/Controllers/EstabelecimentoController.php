<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\EstabelecimentoService;

class EstabelecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, EstabelecimentoService $service)
    {
        $validacao = $request->validate([
            'nome' => 'requiried',
            'cnpj'=> 'required|unique:estabelecimentos',
            'tipo'=>['required', Rule::in(Estabelecimento::TIPOS)],
            'dias_max'=>'nullable|integer|min:1',
        ]);
        try{
            $service->criarEstabelecimento($validacao);
            return redirect()->route('estabelecimento.index')->with('Sucesso','Criado com sucesso');
        }catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(Estabelecimento $estabelecimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estabelecimento $estabelecimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estabelecimento $estabelecimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estabelecimento $estabelecimento)
    {
        //
    }
}
