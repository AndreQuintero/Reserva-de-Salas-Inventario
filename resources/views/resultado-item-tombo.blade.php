@extends('principal')

@section('conteudo')


 

@if(empty($pesquisa))
<div class="alert alert-danger"> Não há itens correspondentes pelo tombo </div>
@else

  
    <h1> Pesquisa do tombo: {{$tombo}}  </h1>

    <table class ="table  table-striped table-bordered table-hover">
    
    <!-- adicionar condição na view para ver quais reservas já foram completadas -->
<tr>
                        <th>Nome do Item </th>
                        <th>Sala </th>
                        <th>Estado </th>
                        
                      
				   </tr>
       
        <?php foreach($pesquisa as $p): ?>
        <tr>
        <td> {{$p->nome_item}}</td>    
        <td> {{ $p->sala }} </td> 
        <td> {{ $p->estado }} </td>  
        
        <?php endforeach ?> <!-- @   endforeach -->
    </table>
    
    @endif
   
   

@stop