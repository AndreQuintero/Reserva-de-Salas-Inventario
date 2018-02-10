@extends('principal')

@section('conteudo')



<h1>Login</h1>


<form action="/minhaautenticacao" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class ="form-group">
        


<label>email:</label>
<input class ="form-control" type="text" name="email1">

        
<label>Senha:</label>
<input class ="form-control" type="password" name="password1">

        </br>
<button class ="btn btn-primary" type="submit">LogIn</button>
    </div>        
</form>

        

@stop