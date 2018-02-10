@extends('principal')

@section('conteudo')

</br>
</br>
@if (isset($erro)) 
<div class="alert alert-danger"> 
    <ul>
        <p>Login ou senha incorreto.</p>
         
    </ul>  
</div> 
@endif


<h1>Login</h1>


<form action="/teste2" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class ="form-group">
        


<label>email:</label>
<input class ="form-control" type="text" name="email">

        
<label>Senha:</label>
<input class ="form-control" type="password" name="password">

        </br>
<button class ="btn btn-primary" type="submit">LogIn</button>
    </div>        
</form>

        

@stop