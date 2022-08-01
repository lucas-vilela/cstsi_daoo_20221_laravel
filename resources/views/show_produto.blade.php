<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <title>{{ $produto ? $produto->nome : 'Detalhes do Produto' }}</title>
</head>
<body>
    @vite('resources/css/show-prod.css')
    <div class="container text-center">
        <h1>{{ $produto ? $produto->nome : 'Detalhes do Produto' }}</h1>
        @if ($produto)
            <div class="row align-items-center">
                <div class="col">
                    <h2 class='text-center  fw-bolder'>Descrição:</h2>
                    <p>
                        {{ $produto->descricao }}
                    </p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 offset-md-3 align-self-center">
                    <table class='table'>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Preço</th>
                                <td>{{ number_format($produto->preco, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Quantidade</th>
                                <td>{{ $produto->qtd_estoque }}</td>
                            </tr>
                            <tr>
                                <th>Importado</th>
                                <td>{{ $produto->importado ? 'Sim' : 'Não' }}</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="row align-items-center">
                        <div class="row align-items-center">
                            <div class="col">
                                <p>Produto não encontrado! </p>
        @endif
        <a href="/produto"><button type="button" class="btn btn-primary">
                Voltar
            </button>
        </a>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>
</html>
