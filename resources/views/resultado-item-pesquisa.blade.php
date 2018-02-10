@extends('principal')

@section('conteudo')


 

@if(empty($pesquisa))
<div class="alert alert-danger"> Ainda não há itens cadastrados nesta sala </div>
@else

  
    <h1>  Itens da sala {{$sala}} </h1>

    <table class ="table  table-striped table-bordered table-hover">
    
    <!-- adicionar condição na view para ver quais reservas já foram completadas -->
<tr>
                        <th>Nome do Item </th>
                        <th>Tombo </th>
                        <th>Estado </th>
                        
                      
				   </tr>
       
        <?php foreach($pesquisa as $p): ?>
        <tr>
        <td> {{$p->nome_item}}</td>    
        <td> {{ $p->tombo }} </td> 
        <td> {{ $p->estado }} </td>  
        
        <?php endforeach ?> <!-- @   endforeach -->
    </table>
    
    @endif
   
   

@stop
