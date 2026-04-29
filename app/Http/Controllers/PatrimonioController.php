<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatrimonioRequest;
use App\Models\Patrimonio;
use App\Services\PatrimonioService;
use Illuminate\Http\Request;

class PatrimonioController extends Controller
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
    public function store(StorePatrimonioRequest $request, PatrimonioService $servico)
    {
        try{
            $servico->criarPatrimonio($request->validated());
            return redirect()->route('patrimonios.index')->with('sucesso','Patrimônio criado');
        }catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        }
    

    /**
     * Display the specified resource.
     */
    public function show(Patrimonio $patrimonio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patrimonio $patrimonio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patrimonio $patrimonio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patrimonio $patrimonio)
    {
        //
    }

    public function baixa(Request $request,Patrimonio $patrimonio, PatrimonioService $servico){
        $request->validate([
            'motivo_baixa'=>'required|string|max:255'
        ]);

        try{
            $servico->darBaixa($patrimonio, $request->motivo_baixa);
            return redirect()->route('patrimonios.index')->with('sucesso','patrimonio baixado com sucesso');

        }catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    
}
