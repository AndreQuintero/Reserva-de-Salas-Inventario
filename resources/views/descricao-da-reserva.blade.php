@extends('principal')

@section('conteudo')
    <h1> Descrição da Reserva  </h1>
   

  <ul>   
      <li><strong>Requisitante:</strong> {{$r->requisitante}} </li>
       <li><strong>Data:</strong> {{Carbon\Carbon::parse($r->data)->format('d-m-Y')}} </li>
       <li><strong>Hora de Início:</strong> {{$r->hora_ini}} </li>
       <li><strong>Hora de Término:</strong> {{$r->hora_ter}} </li>
</br>
<li><strong>Descrição:</strong> {{$r->descricao}}</li>
</ul> 
         
@stop