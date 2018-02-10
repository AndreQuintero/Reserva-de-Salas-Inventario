@extends('principal')

@section('conteudo')


 

@if(empty($salas))
<div class="alert alert-danger"> Não houve salas . </div>
@else


    <h1>  Lista de Salas Mais Usadas </h1>
 
    <table class ="table  table-striped table-bordered table-hover">
    
       <tr>
                        <th>Sala </th>
                        <th>Reservas </th>
				   </tr>

         @foreach($salas as $s) <!-- pode se usar @     foreach com o blade -->
       
          <tr>  
        <td>{{ $s->sala}}</td>    <!-- $r -> nome da função no model Reserva(definir as chaves lá)-> nome do atributo do banco-->                  
        <td>{{ $s->numReservas }} Reservas </td> 
        </tr>
        @endforeach <!-- @   endforeach -->
    </table>
    
    @endif
   
   

@stop
