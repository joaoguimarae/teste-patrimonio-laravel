<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstabelecimentoRequest;
use App\Models\Estabelecimento;
use Illuminate\Http\Request;
use App\Services\EstabelecimentoService;

class EstabelecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estabelecimentos = \App\Models\Estabelecimento::all();
        return view('estabelecimentos.index', compact('estabelecimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estabelecimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstabelecimentoRequest $request,EstabelecimentoService $service)
    {
        
        try{
            $service->criarEstabelecimento($request->validated());
            return redirect()->route('estabelecimentos.index')->with('Sucesso','Criado com sucesso');
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
