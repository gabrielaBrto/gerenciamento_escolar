<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo</title>
</head>
<body>
<h4 style="color:#36f734; text-align:center">USUARIOS</h4>
<hr>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data Nascimento</th>
            <th>Nível</th>
            <th>Editar</th>
        </tr>
        @foreach($usuarios as $usuario)
        <tr>
            <th>{{ $usuario->nome }}</th>
            <th>{{ $usuario->email }}</th>
            <th>{{ $usuario->data_nascimento }}</th>
            <th>{{ $usuario->nivel->nome }}</th>
            <th><button><a href="{{url('/'.$usuario->id.'/edit')}}">Editar</a></button></th>
        </tr>
        @endforeach
    </table>
    <hr>
    <br><br>
    <button><a href="{{url('/nivel')}}">Niveis</a></button>
    <button><a href="{{url('/form')}}">Novo</a></button>
</body>
</html>