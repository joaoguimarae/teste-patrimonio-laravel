<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Empréstimos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Sistema de Patrimônios</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('estabelecimentos.index') }}">Estabelecimentos</a>
                <a class="nav-link" href="{{ route('patrimonios.index') }}">Patrimônios</a>
                <a class="nav-link" href="{{ route('emprestimos.index') }}">Empréstimos</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('conteudo')
    </div>
</body>
</html>