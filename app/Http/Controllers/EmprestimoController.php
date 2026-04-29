<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmprestimoRequest;
use App\Models\Emprestimo;
use Illuminate\Http\Request;
use App\Services\EmprestimoService;

class EmprestimoController extends Controller
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
    public function store(StoreEmprestimoRequest $request, EmprestimoService $service)
    {
       try{
            $service->realizarEmprestimo($request->validated());
            return redirect()->route('emprestimos.index')->with('Sucesso','Emprestimo realizado');
        }catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}
