@extends('principal')

@section('conteudo')


 



    <h1>  Pesquisar Item por Sala:  </h1>
 
  <form action="/resultado-Item-sala" method="get">
   
    <div class ="form-group">
               
<label>Item pertecente a Sala:</label>
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
