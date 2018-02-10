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


<h1>Pesquisar Reservas por Sala</h1>


<form action="/pesquisa/sala/{id}" method="get">
    
    <div class ="form-group">
        
<label>Sala:</label>
<select class ="form-control" name="sala_id">
<!--sala veio do controller no metodo novo -->
@foreach($sala as $s)        
<option value="{{$s->id}}">{{$s->sala}}</option>
@endforeach
</select>        
<br>
<button class ="btn btn-primary" type="submit">Pesquisar</button>
    </div>        
</form>

 
        

@stop