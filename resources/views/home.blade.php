@extends('layouts.app')

@section('conteudo')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-dark" style="letter-spacing: -1px;">Sistema de patrimônios</h1>
                <p class="lead text-secondary">Controle de infraestrutura e alocação de ativos.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background-color: #f8f9fa;">
                        <div class="card-body text-center p-4">
                            <div class="bg-dark text-white rounded d-inline-flex p-3 mb-4 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M6 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M8.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M10 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8.5v3a1.5 1.5 0 0 1 1.5 1.5h5.5a.5.5 0 0 1 0 1H10A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5H.5a.5.5 0 0 1 0-1H6A1.5 1.5 0 0 1 7.5 10V7H2a2 2 0 0 1-2-2zM2 3a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"/>
                                </svg>
                            </div>
                            <h5 class="card-title fw-bold text-dark">Estabelecimentos</h5>
                            <p class="card-text text-muted mb-4 small">Mapeamento de unidades e definição de parâmetros de alocação.</p>
                            <a href="{{ route('estabelecimentos.index') }}" class="btn btn-dark w-100 fw-semibold" style="border-radius: 8px;">Acessar Módulo</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background-color: #f8f9fa;">
                        <div class="card-body text-center p-4">
                            <div class="bg-dark text-white rounded d-inline-flex p-3 mb-4 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M5 0h1a.5.5 0 0 1 .5.5V2h3V.5a.5.5 0 0 1 1 0V2h1.5a.5.5 0 0 1 .5.5v1.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-.5.5H12v1.5a.5.5 0 0 1-1 0V14H8v1.5a.5.5 0 0 1-1 0V14H5v1.5a.5.5 0 0 1-1 0V14H2.5a.5.5 0 0 1-.5-.5V12H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2V8H.5a.5.5 0 0 1 0-1H2V6H.5a.5.5 0 0 1 0-1H2V3.5a.5.5 0 0 1 .5-.5H4V.5A.5.5 0 0 1 4.5 0zm-.5 3a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-8z"/>
                                    <path d="M5.5 4.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-4z"/>
                                </svg>
                            </div>
                            <h5 class="card-title fw-bold text-dark">Patrimônios</h5>
                            <p class="card-text text-muted mb-4 small">Controle de inventário, registro e gerenciamento de baixas.</p>
                            <a href="{{ route('patrimonios.index') }}" class="btn btn-dark w-100 fw-semibold" style="border-radius: 8px;">Acessar Módulo</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; background-color: #f8f9fa;">
                        <div class="card-body text-center p-4">
                            <div class="bg-dark text-white rounded d-inline-flex p-3 mb-4 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </div>
                            <h5 class="card-title fw-bold text-dark">Empréstimos</h5>
                            <p class="card-text text-muted mb-4 small">Processamento de transferências com validação de regras de negócio.</p>
                            <a href="{{ route('emprestimos.index') }}" class="btn btn-dark w-100 fw-semibold" style="border-radius: 8px;">Acessar Módulo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection