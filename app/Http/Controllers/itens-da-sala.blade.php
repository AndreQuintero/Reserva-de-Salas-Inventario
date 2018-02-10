@extends('principal')

@section('conteudo')


 



    <h1>  Pesquisar Item por Sala:  </h1>
 
  <form action="/pesquisa-item" method="get">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class ="form-group">
               
<label>Item pertecente a Sala:</label>
<select class ="form-control" name="sala_id">
<!--sala veio do controller no metodo novo -->
@foreach($sala as $s)        
<option value="{{$s->id}}">{{$s->sala}}</option>
@endforeach
</select>        
         
      </div>
</form>
    @endif
   
   

@stop
