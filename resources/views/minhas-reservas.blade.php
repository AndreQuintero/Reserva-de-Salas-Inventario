@extends('principal')

@section('conteudo')


 

@if(empty($reservas))
<div class="alert alert-danger"> Você não tem nenhuma reserva feita. </div>
@else



    <h1> Listas das reservas feitas por você </h1>
 
    <table class ="table  table-striped table-bordered table-hover">
    
       <tr>
                        <th>Sala </th>
                        <th>Requisitante </th>
                        <th>Horário de início </th>
                        <th>Horário de término </th>
                        <th>Data </th>
                        <th>Detalhes </th>
                        <th>Excluir</th>
                     
                      
				   </tr>

         <?php foreach($reservas as $reserva): ?> <!-- pode se usar @     foreach com o blade -->
       
        <tr>  
        <td> {{ $reserva->sala->sala}}</td>    <!-- $reservas -> nome da função no model Reserva(definir as chaves lá)-> nome do atributo do banco-->                  
        <td> {{ $reserva->requisitante }} </td> 
        <td> {{ $reserva->hora_ini }} </td>  
        <td> {{ $reserva->hora_ter}} </td>  
        <td> {{ Carbon\Carbon::parse($reserva->data)->format('d/m/Y')}} </td>  
        <td> <a href="/reserva/descricao/<?= $reserva->id ?>">Detalhes</a></td>  
        <td> <a href="/reserva/remove/<?= $reserva->id ?>">Excluir</a></td>       
        </tr>
        <?php endforeach ?> <!-- @   endforeach -->
    </table>
    @endif

    @if(old('requisitante'))
  <div class="alert alert-success"> <strong>Sucesso!</strong> Reserva em nome de {{old('requisitante')}} feita com sucesso! </div>
    @endif  <!--se a variavel sala existe, no caso, qnd vc adiciona um produto novo// old- acha o parametro nome da requisição antiga, no caso a de adicionar reservas -->

   

@stop
