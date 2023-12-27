<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Autores</title>
</head>
<style>
    .page-break {
        page-break-after: always;
    }
</style>

<body>

<center>
    <h1>Relatório de Autores</h1>
</center>

<table id="table" class="table table-striped">
    <thead class="thead-light">
        <tr class="text-secondary">
            <th class="text-center" scope="col">Autor</th>
            <th scope="col">Livro</th>
            <th scope="col">Assuntos</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($relAutores as $autor)
        <tr>
            <td>{{ $autor->Autor }}</td>
            <td>{{ $autor->Livro }}</td>
            <td>{{ $autor->Assuntos }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>

</html>
