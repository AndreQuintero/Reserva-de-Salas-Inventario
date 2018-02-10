<html>

<head>
 <title>Reserva de Salas</title>   
 <meta charset = "UTF-8">
 <link rel ="stylesheet" type="text/css" href="/css/app.css">
<link rel ="stylesheet" type="text/css" href="/css/meuCss.css">

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
      @yield('conteudo')  
        
        
        
    </div>
    <script src="/jquery/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    </body>
</html>