@extends('principal')

@section('conteudo')



@if(empty($users))
<div class="alert alert-danger"> Não há usuários cadastrados </div>
@else



    <h1> Listas de Usuários </h1>
 
    <table class ="table  table-striped table-bordered table-hover">
    
       
<tr>
                        <th>Nome </th>
                        <th>Email </th>
                        <th>Administrador </th>
                        <th>Excluir </th>
                        
                        </tr>
         <!-- pode se usar @     foreach com o blade -->
         @foreach($users as $u)
         <tr>  
        <td>{{$u->name}}</td>    <!-- $reservas -> nome da função no model Reserva(definir as chaves lá)-> nome do atributo do banco-->          <td>{{$u->email }} </td>
        @if($u->is_Adm == 1)  <!-- se for adm, fica Sim na tabela, caso contrário fica não -->    
        <td>Sim</td>
        @else
        <td>Não</td>
        @endif     
        <td> <a href="/usuarios/remove/{{$u->id}}">Excluir</a></td>     
        @endforeach     
        </tr>
      
    </table>
    @endif

  
@stop
