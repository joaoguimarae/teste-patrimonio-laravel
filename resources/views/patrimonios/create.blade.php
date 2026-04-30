@extends('layouts.app')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Novo Patrimônio</h2>
        <a href="{{ route('patrimonios.index') }}" class="btn btn-secondary">Voltar</a>
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

            <form action="{{ route('patrimonios.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome do Patrimônio</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="codigo" class="form-label">Código (Ex: ULTRA-001)</label>
                        <input type="text" name="codigo" id="codigo" class="form-control" value="{{ old('codigo') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="Próprio" {{ old('tipo') == 'Próprio' ? 'selected' : '' }}>Próprio</option>
                            <option value="Alugado" {{ old('tipo') == 'Alugado' ? 'selected' : '' }}>Alugado</option>
                            <option value="Emprestado" {{ old('tipo') == 'Emprestado' ? 'selected' : '' }}>Emprestado</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="data_entrada" class="form-label">Data de Entrada</label>
                        <input type="date" name="data_entrada" id="data_entrada" class="form-control" value="{{ old('data_entrada') }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="estabelecimento_id" class="form-label">Estabelecimento Pai</label>
                        <select name="estabelecimento_id" id="estabelecimento_id" class="form-select" required>
                            <option value="">Selecione quem é o dono...</option>
                            @foreach($estabelecimentos as $est)
                                <option value="{{ $est->id }}" {{ old('estabelecimento_id') == $est->id ? 'selected' : '' }}>
                                    {{ $est->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3">Salvar Patrimônio</button>
            </form>
        </div>
    </div>
@endsection