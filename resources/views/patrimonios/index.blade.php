@extends('layouts.app')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gestão de Patrimônios</h2>
        <a href="{{ route('patrimonios.create') }}" class="btn btn-primary">Novo Patrimônio</a>
    </div>

    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th width="300">Ações / Motivo da Baixa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patrimonios as $patrimonio)
                        <tr>
                            <td><code>{{ $patrimonio->codigo }}</code></td>
                            <td>{{ $patrimonio->nome }}</td>
                            <td>{{ $patrimonio->tipo }}</td>
                            <td>
                                @if($patrimonio->data_baixa)
                                    <span class="badge bg-danger">Baixado em {{ \Carbon\Carbon::parse($patrimonio->data_baixa)->format('d/m/Y') }}</span>
                                @else
                                    <span class="badge bg-success">Ativo</span>
                                @endif
                            </td>
                            <td>
                                @if(!$patrimonio->data_baixa)
                                    {{-- Formulário rápido para dar baixa --}}
                                    <form action="{{ route('patrimonios.baixar', $patrimonio->id) }}" method="POST" class="d-flex gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="text" name="motivo_baixa" class="form-control form-control-sm" placeholder="Motivo da baixa" required>
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Baixar</button>
                                    </form>
                                @else
                                    <small class="text-muted"><strong>Motivo:</strong> {{ $patrimonio->motivo_baixa }}</small>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            @if($patrimonios->isEmpty())
                <p class="text-center text-muted">Nenhum patrimônio cadastrado ainda.</p>
            @endif
        </div>
    </div>
@endsection