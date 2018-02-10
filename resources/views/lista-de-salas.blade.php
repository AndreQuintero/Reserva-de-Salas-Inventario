@extends('principal')

@section('conteudo')


  @if(empty($salas))
<div class="alert alert-danger"> Você não tem nenhuma sala cadastrada. </div>
@else


    <h1> Listas de Salas </h1>
    
    <table class ="table  table-striped table-bordered table-hover">
       <tr>
                        <th>Sala </th>
                        <th>Detalhes </th>
                        @if(Auth::user()->is_Adm == 1)
                        <th>Excluir </th>
                        @endif
                        
                      
				   </tr>
        
        <?php foreach($salas as $s): ?> <!-- pode se usar @     foreach com o blade -->
    <tr>  
    <td>Sala:<?= $s->sala ?></td>               <!-- puxa a informação do banco para a tabela -->                  
    <td> <a href="/salas/detalhes/{{$s->id}}">Detalhes</a></td>  
     @if(Auth::user()->is_Adm == 1)   <!-- verifica se é adm -->
        <td> <a href="/sala/remove/{{$s->id}}">Excluir</a></td>       
    @endif
        </tr>
        
    </tr>
        <?php endforeach ?> <!-- @   endforeach -->
    </table>
    @endif 



    @if(old('sala'))
  <div class="alert alert-success"> <strong>Sucesso!</strong> Sala {{old('sala')}} cadastrada! </div>
    @endif  <!--se a variavel sala existe, no caso, qnd vc adiciona um produto novo// old- acha o parametro nome da requisição antiga, no caso a de adicionar reservas -->
@stop