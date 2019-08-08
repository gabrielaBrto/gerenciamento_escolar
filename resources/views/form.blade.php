<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div>
        @if(Session::has('success'))
            <p style="color:green">{{Session::get('success')}}</p>
        @endif

        @if(Session::has('error'))
            <p style="color:red">{{Session::get('error')}}</p>
        @endif
    </div>

    <form method="POST" action="{{ url('/'.(isset($usuario) ? $usuario->id : '') ) }}">
    @csrf

    @if(isset($usuario))
        @method('PUT')
    @endif
    
    <!-- @foreach($errors->all() as $error)
        {{$error}}
        <br>
    @endforeach -->

        <label for="nome">Nome</label>
        <input value="{{ old('nome', isset($usuario) ?  $usuario->nome : '')}}" type="text" name="nome"><br>   
        <span style="color:red">{{$errors->first('nome')}}</span>
        
        <br><label for="email">Email</label>
        <input  value="{{ old('email', isset($usuario) ?  $usuario->email : '')}}" type="text" name="email"><br>
        <span style="color:red">{{$errors->first('email')}}</span>
        
        <br><label for="data_nascimento">Data Nascimento</label>
        <input value="{{ old('data_nascimento', isset($usuario) ?  $usuario->data_nascimento : '')}}" type="text" name="data_nascimento"><br>
        <span style="color:red">{{$errors->first('data_nascimento')}}</span>
        <br><br>
        <select name="materias[]" multiple>
            @foreach($materias as $materia)
                <option value="{{$materia->id}}" >{{$materia->nome}}</option>
            @endforeach 
        </select>

        <br>
        <br><label for="nivel">Nivel</label><br>
        <select name="nivel_id">
            @foreach($niveis as $nivel)
                <option {{ isset($usuario) && $usuario->nivel_id == $nivel->id ? 'selected' : '' }} value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
            @endforeach
        </select>
        <span style="color:red">{{$errors->first('nivel_id')}}</span>
        <br><br>


        <input type="submit" value="Enviar">
    </form>
</body>
</html>