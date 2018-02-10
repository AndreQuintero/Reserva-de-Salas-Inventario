@extends('principal')

@section('conteudo')
    <h1> Detalhes da Sala <?= $s->sala ?> </h1>
   
    <table class ="table  table-striped table-bordered table-hover">
    <tr>
                        <th>Quantidade de Computadores </th>
                        <th>Número de Projetores </th>  
     </tr>
        <tr>  
        <td> {{$s->pc}}</td>               <!-- puxa a informação do banco para a tabela -->                  
        <td> {{$s->projetor}} </td> 
       </tr>
    </table>

    <h1>Equipamentos</h1>

    <table class ="table  table-striped table-bordered table-hover">
    <tr>
                        <th>Nome do Item </th>
                        <th>Tombo </th> 
                        <th>Estado </th>  
     </tr>  
        @foreach($itens as $i)
        <tr>  
        <td> {{$i->nome_item}}</td>               <!-- puxa a informação do banco para a tabela -->                  
        <td> {{$i->tombo}} </td>
        <td> {{$i->estado}} </td> 
        @endforeach    
       </tr>
    </table>
        
@stop