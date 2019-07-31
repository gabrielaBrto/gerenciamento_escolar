<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo</title>
</head>
<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data Nascimento</th>
            <th>Nível</th>
        </tr>
        @foreach($usuarios as $usuario)
        <tr>
            <th>{{ $usuario->nome }}</th>
            <th>{{ $usuario->email }}</th>
            <th>{{ $usuario->data_nascimento }}</th>
            <th>{{ $usuario->nivel->nome }}</th>
        </tr>
        @endforeach
    </table>
</body>
</html>