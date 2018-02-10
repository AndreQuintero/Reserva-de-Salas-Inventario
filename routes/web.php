<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//SALAS
Route::get('/salas','SalaController@listaSala');
Route::get('/salas/detalhes/{id}','SalaController@detalhesSala')->where('id', '[0-9]+');
Route::get('/cadastrar-sala','SalaController@cadastroSalaView');
Route::post('/sala/adiciona','SalaController@adicionaSala');
Route::get('/sala/remove/{id}','SalaController@removeSala');
Route::get('/salas-mais-usadas','SalaController@salasUsadas');



//RESERVAS
Route::get('/reservas','ReservaController@listaReserva'); //Controller/método+classe
Route::get('/nova-reserva','ReservaController@novaReserva'); 
Route::post('/reserva/adiciona','ReservaController@adicionaReserva'); //formulario do tipo post
Route::get('/reserva/descricao/{id}','ReservaController@detalhesReserva')->where('id', '[0-9]+');
Route::get('/reserva/remove/{id}','ReservaController@removeReserva')->where('id', '[0-9]+');
Route::get('/error','ReservaController@errorReserva');
Route::get('/reservas-de-hoje','ReservaController@hojeReserva');
Route::get('/reservas-futuras','ReservaController@futuraReserva');
Route::get('/minhas-reservas','ReservaController@minhasReservas'); 

//ITEM
Route::get('/cadastrar-item','ItemController@viewCadastroItem');
Route::post('/item-verifica','ItemController@verificaItem'); 
Route::get('/item-cadastrado','ItemController@viewItemCadastrado');
Route::get('/item-nao-cadastrado','ItemController@viewItemNaoCadastrado');

//PESQUISA
Route::get('/pesquisa-por-sala','ReservaController@pesquisasalaReserva');
Route::get('/pesquisa/sala/{id}','ReservaController@pesquisandosalaReserva');
Route::get('/pesquisa-por-data','ReservaController@pesquisadataReserva');
Route::get('/pesquisa/data/','ReservaController@pesquisandodataReserva');
Route::get('/pesquisa-item-sala','ItemController@viewVerItem');
Route::get('/resultado-Item-sala','ItemController@pesquisaSalaItem');
Route::get('/pesquisa-tombo','ItemController@viewPesquisaTombo');
Route::get('/resultado-tombo','ItemController@pesquisaTombo');

//SAIR
Route::get('/sair','SairController@sair');

//USERS
Route::get('/usuarios','UserController@mostraUsuarios');
Route::get('/usuarios/remove/{id}','UserController@removeUsuario')->where('id', '[0-9]+');

Auth::routes(); // /register  /login

Route::get('/home', 'HomeController@index');


