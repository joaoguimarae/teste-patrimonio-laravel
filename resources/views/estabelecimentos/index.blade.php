@extends('layouts.app')
@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lista de Estabelecimentos</h2>
        <a href="{{ route('estabelecimentos.create') }}" class="btn btn-primary">Novo Estabelecimento</a>
    </div>

    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Tipo</th>
                        <th>Prazo Máx.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estabelecimentos as $estabelecimento)
                        <tr>
                            <td>{{ $estabelecimento->id }}</td>
                            <td>{{ $estabelecimento->nome }}</td>
                            <td>{{ $estabelecimento->cnpj }}</td>
                            <td>{{ $estabelecimento->tipo }}</td>
                            <td>{{ $estabelecimento->dias_max_emprestimo ?? 'Sem limite' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection