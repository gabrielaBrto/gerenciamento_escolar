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
    <h1>usuarios Ativos</h1>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data Nascimento</th>
            <th>Nível</th>
            <th>Editar</th>
            <td>Deletar</td>
        </tr>
        @foreach($usuarios as $usuario)
        <tr>
            <th>{{ $usuario->nome }}</th>
            <th>{{ $usuario->email }}</th>
            <th>{{ $usuario->data_nascimento }}</th>
            <th>{{ $usuario->nivel->nome }}</th>
            <th><button><a href="{{url('/'.$usuario->id.'/edit')}}">Editar</a></button></th>
            <th>
                <form action="{{url($usuario->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit"> Deletar</button>
                </form>
            </th>
        </tr>
        @endforeach
    </table>
    <hr>

    <h1>Usuarios Deletados</h1>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data Nascimento</th>
            <th>Nível</th>
            <th>Editar</th>
            <td>Deletar</td>
        </tr>
        @foreach($usuariosDeletados as $usuario)
        <tr>
            <th>{{ $usuario->nome }}</th>
            <th>{{ $usuario->email }}</th>
            <th>{{ $usuario->data_nascimento }}</th>
            <th>{{ $usuario->nivel->nome }}</th>
            <th><button><a href="{{url('/'.$usuario->id.'/edit')}}">Editar</a></button></th>
            <th>
                <form action="{{url('restore/'.$usuario->id)}}" method="post">
                    @method('put')
                    @csrf
                    <button type="submit"> Ativar</button>
                </form>
            </th>
        </tr>
        @endforeach
    </table>
    <br><br>
    <button><a href="{{url('/nivel')}}">Niveis</a></button>
    <button><a href="{{url('/form')}}">Novo</a></button>
</body>
</html>