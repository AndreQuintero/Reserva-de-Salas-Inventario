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


<h1>Cadastrar Item</h1>


<form action="/item-verifica" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class ="form-group">
               

<label>Nome do Item:</label>
<input class ="form-control" type="text" name="nome_item">

        
<label>Tombo:</label>
<input class ="form-control" type="text" name="tombo">

<label>Item pertecente a Sala:</label>
<select class ="form-control" name="sala_id">
<!--sala veio do controller no metodo novo -->
@foreach($sala as $s)        
<option value="{{$s->id}}">{{$s->sala}}</option>
@endforeach
</select>        

<label>Estado do item:</label>
<select class ="form-control" name="estado">

       
<option value="Bom">Bom</option>
<option value="Regular">Regular</option>
<option value="Péssimo">Péssimo</option>
</select>        
<br>
<button class ="btn btn-primary" type="submit">Cadastrar Item</button>
    </div>        
</form>
@stop