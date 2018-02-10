@extends('principal')

@section('conteudo')



@if(empty($reservas))
<div class="alert alert-danger"> Você não tem nenhuma sala cadastrada. </div>
@else



    <h1> Listas de Reservas </h1>
 
    <table class ="table  table-striped table-bordered table-hover">
    
       
<tr>
                        <th>Sala </th>
                        <th>Requisitante </th>
                        <th>Horário de início </th>
                        <th>Horário de término </th>
                        <th>Data </th>
                        <th>Detalhes </th>
                        @if(Auth::user()->is_Adm == 1)
                        <th>Conta</th>
                        <th>Excluir</th>
                        @endif
                      
				   </tr>
         <?php foreach($reservas as $reserva): ?> <!-- pode se usar @     foreach com o blade -->
       
          <tr>  
        <td>{{ $reserva->sala->sala}}</td>    <!-- $reservas -> nome da função no model Reserva(definir as chaves lá)-> nome do atributo do banco-->                  
        <td>{{ $reserva->requisitante }} </td> 
        <td>{{$reserva->hora_ini}} </td>  
        <td> {{$reserva->hora_ter}} </td>  
        <td>{{ Carbon\Carbon::parse($reserva->data)->format('d/m/Y') }} </td>  <!-- converte a data para dia-mes-ano-->
        <td> <a href="/reserva/descricao/{{$reserva->id}}">Detalhes</a></td>  
        @if(Auth::user()->is_Adm == 1)   <!-- verifica se é adm -->
        <td>{{$reserva->user->email}} </td>        
        <td> <a href="/reserva/remove/{{$reserva->id}}">Excluir</a></td>       
        @endif
        </tr>
        <?php endforeach ?> <!-- @   endforeach -->
    </table>
    @endif

    @if(old('requisitante'))
  <div class="alert alert-success"> <strong>Sucesso!</strong> Reserva por {{old('requisitante')}} feita com sucesso! </div>
    @endif  <!--se a variavel sala existe, no caso, qnd vc adiciona um produto novo// old- acha o parametro nome da requisição antiga, no caso a de adicionar reservas -->

   

@stop

