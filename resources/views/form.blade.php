<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ url((isset($usuario) ? $usuario->id : '')) }}">

    @if(isset($usuario))
        @method('PUT')
    @endif
    <!-- CRIANDO => URL('/')
    ATUALIZANDO => URL('/{id}') -->
    @csrf
        <label for="nome">Nome</label>
        <input value="{{ isset($usuario) ?  $usuario->nome : ''}}" type="text" name="nome"><br>

        <br><label for="email">Email</label>
        <input  value="{{ isset($usuario) ?  $usuario->email : ''}}" type="text" name="email"><br>

        <br><label for="data_nascimento">Data Nascimento</label>
        <input value="{{ isset($usuario) ?  $usuario->data_nascimento : ''}}" type="text" name="data_nascimento"><br>
        
        <br><label for="nivel">Nivel</label><br>
        <select name="nivel_id">
            @foreach($niveis as $nivel)
                <option {{ isset($usuario) && $usuario->nivel_id == $nivel->id ? 'selected' : '' }} value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
            @endforeach
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>