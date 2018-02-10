
<html>

<head>
 <title>Reserva de Salas</title>   
 <meta charset = "UTF-8">
 <link rel ="stylesheet" type="text/css" href="/css/app.css">
<link rel ="stylesheet" type="text/css" href="/css/meuCss.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    
</head>
<body>
    <div class="container">
        
        
        
        





<header>
				
						
			<!-- menu de navegação -->
			<div class="container">
				<div class="row">
          <nav class="pull-right menu">


						<ul>
                            <!--Usuários -->
                            @if(Auth::user()->is_Adm == 1)
                            <li class="li-botao">
                                <div class="dropdown btn-topo">
								  <button class="btn btn-success  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    Usuários
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								    <li><a href="/register">Registar Usuário</a></li>
								      <li><a href="/usuarios">Mostrar Usuários</a></li>
								  </ul>
								</div>	
                            </li>
                            @endif
                            
							<li class="li-botao">
                                <div class="dropdown btn-topo">
								  <button class="btn btn-success  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    Reservas
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								    <li><a href="/reservas-de-hoje">Reservas do Dia</a></li>
								      <li><a href="/reservas-futuras">Próximas Reservas</a></li>
                                      <li><a href="/reservas">Todas as Reservas</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="/nova-reserva">Nova Reserva</a></li>
                                      <li><a href="/minhas-reservas">Minhas Reservas</a></li>
								  </ul>
								</div>	

							</li>

							<li class="li-botao">

								<div class="dropdown btn-topo">
								  <button class="btn btn-success  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    Pesquisar
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								    <li><a href="/pesquisa-por-sala">Pesquisar Reservas por Sala</a></li>
								      <li><a href="/pesquisa-por-data">Pesquisar Reservas por Data</a></li>
								  </ul>
								</div>	
                            </li>
                            @if(Auth::user()->is_Adm == 1) 
							<li class="li-botao">

								<div class="dropdown btn-topo">
								  <button class="btn btn-success  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    Inventário
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								    <li><a href="/cadastrar-item">Cadastrar Item</a></li>
								      <li><a href="/pesquisa-item-sala">Pesquisar Item por Sala</a></li>
                                      <li><a href="/pesquisa-tombo">Pesquisar Item por Tombo</a></li>
                                      
								  </ul>
								</div>	
                            </li>
                            @endif
                            
                            <li class="li-botao">

								<div class="dropdown btn-topo">
								  <button class="btn btn-success  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    Salas
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								    <li><a href="/salas">Salas</a></li>
                                    <li><a href="/salas-mais-usadas">Salas Mais Usadas</a></li> 
								    @if(Auth::user()->is_Adm == 1)  
                                    <li><a href="/cadastrar-sala">Cadastrar Sala</a></li>
                                    @endif  
								  </ul>
								</div>	
                            </li>
                        
							
                        

							<li class="li-botao">
								 <div>
							    <button class="btn btn-success btn-topo" type="button">
							    <a href="/sair">Sair</a>
							   </button>
						    </div>
							</li>

						</ul>

				</nav>
			</div>
		</div>
	</header>
        
        
        

        </br>
    <p>Logado como: {{ Auth::user()->name }}</p>


</br>
</br>
@if (count($errors) > 0) 
<div class="alert alert-danger"> 
    <ul> @foreach ($errors->all() as $error) 
        <li>{{ $error }}</li> 
        @endforeach 
    </ul>  
</div> 
@endif


<h1>Reservar Sala</h1>


<form action="/reserva/adiciona" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class ="form-group">
   
      
<label>Sala:</label>
<select class ="form-control" name="sala_id">
<!--sala veio do controller no metodo novo -->
@foreach($sala as $s)        
<option value="{{$s->id}}">{{$s->sala}}</option>
@endforeach
</select>        

<label>Requisitante:</label>
<input class ="form-control" type="text" name="requisitante">

        
<label>Hora de Início</label>
<input class ="form-control" type="time" id="hora_inicio" name="hora_ini">

<label>Hora de Término</label>
<input class ="form-control" type="time" id="hora_termino" name="hora_ter">
        
<label>Data</label>
<input class ="form-control" type="text" id="datepicker" name="data" placeholder ="aaaa/mm/dd">

<label>Descrição:</label>
<textarea class ="form-control" name="descricao"></textarea>
        </br>
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">  
<button class ="btn btn-primary" type="submit">Reservar</button>
    </div>        
</form>

 

 </div>
    <script src="/jquery/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker();
  });
    
       
  /*  $( function() {
    $( "#datepicker" ).datepicker();
   /* $( "#format" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this.).val() );
    });
  } );*/
    
   
</script>

    </body>
</html>