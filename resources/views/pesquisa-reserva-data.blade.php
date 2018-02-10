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


<h1>Pesquisar Reservas pela Data</h1>


<form action="/pesquisa/data/" method="get">
   
    <div class ="form-group">
        
<label>Data:</label>
<input class ="form-control" type="text" id="datepicker" name="data" placeholder="aaaa-mm-dd">      
<br>
<button class ="btn btn-primary" type="submit">Pesquisar</button>
    </div>        
</form>
 


        

@stop