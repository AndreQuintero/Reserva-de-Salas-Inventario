@extends('principal')

@section('conteudo')


 

@if(empty($pesquisa))
<div class="alert alert-danger"> Ainda não há reservas feita nesta sala para os próximos dias. </div>
@else

  
    <h1>  Reservas feitas na sala {{$nomeSala}} </h1>

    <table class ="table  table-striped table-bordered table-hover">
    
    <!-- adicionar condição na view para ver quais reservas já foram completadas -->

       <tr>
                        
                        <th>Requisitante </th>
                        <th>Horário de início </th>
                        <th>Horário de término </th>
                        <th>Data </th>
                        <th>Detalhes </th>
                        
                      
				   </tr>
        <?php foreach($pesquisa as $p): ?>
        <tr>
        <td> {{ $p->requisitante }} </td> 
        <td> {{ $p->hora_ini }} </td>  
        <td> {{ $p->hora_ter}} </td>  
        <td>{{ $p->data }} </td>  
        <td> <a href="/reserva/descricao/<?= $p->id ?>">Detalhes</a></td>        
        </tr>
        <?php endforeach ?> <!-- @   endforeach -->
    </table>
    
    @endif
   
   

@stop
