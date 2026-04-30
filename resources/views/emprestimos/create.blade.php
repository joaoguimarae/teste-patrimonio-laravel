@extends('layouts.app')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Realizar Transferência / Empréstimo</h2>
        <a href="{{ route('emprestimos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('emprestimos.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="patrimonio_id" class="form-label">Patrimônio a ser Movimentado</label>
                        <select name="patrimonio_id" id="patrimonio_id" class="form-select" required>
                            <option value="">Selecione o item...</option>
                            @foreach($patrimonios as $pat)
                                <option value="{{ $pat->id }}" {{ old('patrimonio_id') == $pat->id ? 'selected' : '' }}>
                                    {{ $pat->nome }} ({{ $pat->codigo }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="estabelecimento_requerente_id" class="form-label">Estabelecimento Destino (Requerente)</label>
                        <select name="estabelecimento_requerente_id" id="estabelecimento_requerente_id" class="form-select" required>
                            <option value="">Quem vai receber...</option>
                            @foreach($estabelecimentos as $est)
                                <option value="{{ $est->id }}" {{ old('estabelecimento_requerente_id') == $est->id ? 'selected' : '' }}>
                                    {{ $est->nome }} ({{ $est->tipo }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="data_emprestimo" class="form-label">Data do Empréstimo</label>
                        <input type="date" name="data_emprestimo" id="data_emprestimo" class="form-control" value="{{ old('data_emprestimo', now('America/Sao_Paulo')->format('Y-m-d')) }}" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-warning mt-3 fw-bold">Processar Empréstimo</button>
            </form>
        </div>
    </div>
@endsection