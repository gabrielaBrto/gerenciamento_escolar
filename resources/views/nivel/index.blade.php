<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h4 style="color:#36f734; text-align:center">NIVEL</h4>
<hr>
    <table border =1>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Editar</td>
        </tr>
        @foreach($niveis as $nivel)
            <tr>
                <td>{{$nivel->id}}</td>
                <td>{{$nivel->nome}}</td>
                <th><button><a href="{{url('/nivel/'.$nivel->id.'/edit')}}">Editar</a></button></th>
            </tr>

        @endforeach
    </table>
    <hr>
    <br><br>
    <button><a href="{{url('/')}}">Usuarios</a></button>
    <button><a href="{{url('/nivel/form')}}">Novo</a></button>
    
</body>
</html>