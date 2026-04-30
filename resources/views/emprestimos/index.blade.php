@extends('layouts.app')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gestão de Empréstimos</h2>
        <a href="{{ route('emprestimos.create') }}" class="btn btn-primary">Novo Empréstimo</a>
    </div>

    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><strong>Atenção:</strong> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Patrimônio</th>
                        <th>Dono (Atendente)</th>
                        <th>Para onde foi (Requerente)</th>
                        <th>Data do Empréstimo</th>
                        <th>Data de Devolução</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emprestimos as $emprestimo)
                        <tr>
                            <td>{{ $emprestimo->patrimonio->nome }} <code>({{ $emprestimo->patrimonio->codigo }})</code></td>
                            <td>{{ $emprestimo->atendente->nome }}</td>
                            <td>{{ $emprestimo->requerente->nome }}</td>
                            <td>{{ \Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/Y') }}</td>
                            <td>
                                @if($emprestimo->data_devolucao)
                                    <span class="badge bg-primary">
                                        {{ \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/Y') }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">Sem prazo</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($emprestimos->isEmpty())
                <p class="text-center text-muted mt-3">Nenhum empréstimo realizado ainda.</p>
            @endif
        </div>
    </div>
@endsection