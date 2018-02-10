@extends('principal')

@section('conteudo')


 



    <h1>  Pesquisar Item por Tombo:  </h1>
 
  <form action="/resultado-tombo" method="get">
   
    <div class ="form-group">
               
<label>Digite o Tombo:</label>
<input class ="form-control" type="text" name="tombo">

         <br>
<button class ="btn btn-primary" type="submit">Pesquisar</button>
      </div>
</form>
    
   
   

@stop
