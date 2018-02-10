@extends('principal')

@section('conteudo')

</br>
</br>
@if (count($errors) > 0) 
<div class="alert alert-danger"> 
    <ul> @foreach ($errors->all() as $error) 
        <li>{{ $error }}</li> 
        @endforeach 
    </ul>  
</div> 
@endif


<h1>Cadastrar Sala</h1>


<form action="/sala/adiciona" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class ="form-group">
               

<label>Número da Sala:</label>
<input class ="form-control" type="text" name="sala" placeholder="Ex: 101">

        
<label>Número de Computadores:</label>
<input class ="form-control" type="text" name="pc">


<label>Número de Projetores:</label>
<input class ="form-control" type="text" name="projetor">
<br>
<button class ="btn btn-primary" type="submit">Cadastrar Sala</button>
    </div>        
</form>
@stop