@extends('layouts.app')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Novo Estabelecimento</h2>
        <a href="{{ route('estabelecimentos.index') }}" class="btn btn-secondary">Voltar</a>
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

            <form action="{{ route('estabelecimentos.store') }}" method="POST">
                @csrf <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Estabelecimento</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
                </div>

                <div class="mb-3">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" class="form-control" value="{{ old('cnpj') }}" required>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo (Ex: Clínica, Hospital)</label>
                    <input type="text" name="tipo" id="tipo" class="form-control" value="{{ old('tipo') }}" required>
                </div>

                <div class="mb-3">
                    <label for="dias_max_emprestimo" class="form-label">Prazo Máximo de Empréstimo (Dias)</label>
                    <input type="number" name="dias_max_emprestimo" id="dias_max_emprestimo" class="form-control" value="{{ old('dias_max_emprestimo') }}">
                    <div class="form-text">Deixe em branco se o estabelecimento não exigir limite de tempo para devolução.</div>
                </div>

                <button type="submit" class="btn btn-success">Salvar Estabelecimento</button>
            </form>
        </div>
    </div>
@endsection
