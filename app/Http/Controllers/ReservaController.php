<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\DB;
use App\Sala;
use App\Reserva;
use Validator;
use App\Http\Requests\ReservaRequest;
use App\Http\Requests\PesquisasalaRequest;
use App\Http\Requests\PesquisadataRequest;
use Auth;
use Carbon\Carbon;

class ReservaController extends Controller
{
     public function listaReserva()
    {
         //Método que lista todas as reservas feitas
        $reservas = Reserva::all(); // SELECT * FROM reservas
        return view('lista-de-reservas')->with('reservas', $reservas);// a primeira é a variavel da view e a segunda é a daqui
         
        
    }
    public function novaReserva()
    {
        //Método que direciona para a página que cria uma nova reserva
        return view('formulario-reserva')->with('sala', Sala::all()); //manda as salas do banco pra view
    }
    
    public function adicionaReserva(ReservaRequest $request)
    {
        
        
              //Método que verifica as condições para se fazer uma reserva e insere elas no banco.      
        
              $params = $request->all(); // pega todos os parametros da requisição, porem da erro de tokien, então vc deve ir na classe reserva e adicionar os nomes dos elementos dos campos do form 
            //print_r($params);
              $reservas = new Reserva($params); //vai criar um array com todos os dados para o eloquent inserir no banco
               //print_r($reservas);
              
        
        
              $sala = $reservas->sala_id;    //equivalente a $variavel = $_POST['NAME'];
              $data = $reservas->data;
              $hora_iniB = $reservas->hora_ini;
              $hora_ini = $reservas->hora_ini;
              $hora_ini = substr($hora_ini, 0, 2).substr($hora_ini, 3, 2); //converte hora pra inteiro
			  $hora_ini = intval($hora_ini);
              $requisitante = $reservas->requisitante;
              $user_id = $reservas->user_id;
              $hora_ter = $reservas->hora_ter; 
              $descricao = $reservas->descricao;
                
         $arrayData=$data;
         $arrayAnoMesDia = array($arrayData[6],$arrayData[7],$arrayData[8],$arrayData[9],"-",$arrayData[0],$arrayData[1],"-",$arrayData[3],$arrayData[4]);
        
        $anoMesDia = implode("",$arrayAnoMesDia);  // converte mes-dia-ano para ano-mes-dia
        
               
               $dados = DB::select('SELECT sala_id, data, hora_ter FROM reservas WHERE sala_id = ? AND data =?',array($sala, $anoMesDia)); 
               // retorna um array com os dados, caso não haja dados igual no banco ela retorna um array vazio 
                
               for($i = 0; $i<count($dados); $i++)
                 {
                   $horasAnteriores= $dados[$i]->hora_ter;  // atribui uma variavel a hora_ter da consulta
                   $horasAnteriores = substr($horasAnteriores, 0, 2).substr($horasAnteriores, 3, 2); // converte a hora para inteiro
                   $horasAnteriores = intval($horasAnteriores);
                 }
           
            

                  if(empty($dados)){   
                        DB::insert('INSERT INTO reservas(requisitante,descricao,hora_ini,hora_ter,data,sala_id,user_id)VALUES(?,?,?,?,?,?,?)',array($requisitante,$descricao,$hora_iniB,$hora_ter,$anoMesDia,$sala,$user_id));//caso não haja dado igual no banco, já insere.
                    return redirect()->action('ReservaController@listaReserva')->withInput(Request::only('requisitante'));
                       
                   }else if(!empty($dados) && $horasAnteriores > $hora_ini){
                       
                //caso haja dados iguais, verifica se as horas que queremos reservas batem, se baterem não insere
                return redirect()->action('ReservaController@errorReserva');   
              }else{
                    // se não baterem insere
                    DB::insert('INSERT INTO reservas(requisitante,descricao,hora_ini,hora_ter,data,sala_id,user_id)VALUES(?,?,?,?,?,?,?)',array($requisitante,$descricao,$hora_iniB,$hora_ter,$anoMesDia,$sala,$user_id));
                    return redirect()->action('ReservaController@listaReserva')->withInput(Request::only('requisitante')); 
              }
     }
    
    
  
    public function detalhesReserva(){
      
           //Método que pega o id da reserva e redireciona para a página de detalhes.
        
           // voce pode colocar a variavel id no parametro e ocultar ela dps no codigo    
           // $id = Request::input('id'); // Request pega os dados do url(no caso do método get)// pode ter um segundo valor, no caso um default, caso a pessoa passe o link sem nenhum parametro, ira mostrar o valor default, como se fosse a pag index
           $id = Request::route('id'); // aqui ao invés de pegar o GET, ele pega a própria url, no caso a variavel dentro do route tem que ser igual ao do arquivo route  
            
            //$produto = DB::select('SELECT * FROM produtos WHERE id =?',[$id]);
            $reserva = Reserva::find($id);
            
            return view('descricao-da-reserva')->with('r', $reserva);
    }
    public function removeReserva()
    {   
            //Método que pega o id da reserva para deletá-la do banco.    
        
            $id = Request::route('id');
            $reservas = Reserva::find($id); // acha a query da reserva no banco de dados
          
            $idUser = Auth::user()->id;    // ve o id do usuario logado
            $reserva_user_id = $reservas->user_id;   //vê o id do usuário que fez a reserva
       
          
        if(Auth::user()->is_Adm == 1  || $idUser == $reserva_user_id){
            $reservas->delete();
            return redirect()->action('ReservaController@listaReserva');
        }else{
            echo 'você não tem permissão para isso';
        }
        
       
    }
    public function errorReserva()
    {
        //Método que redireciona para uma página de horários inválidos, caso a reserva não seja possível.
        
        return view('errorpag'); // retorna para uma página de erro
    }
    
    public function hojeReserva()
    {
        //Método que pega as reservas do dia de hoje.
        
        $reservas = DB::select('SELECT salas.sala, reservas.id, reservas.requisitante,reservas.hora_ini, reservas.hora_ter, reservas.data FROM salas, reservas WHERE  reservas.data = CURDATE() AND reservas.sala_id = salas.id');
        return view('reservas-de-hoje')->with('reservas', $reservas);
        
    }
    
    public function futuraReserva()
    {
         //Método que pega as reservas futuras ao dia de hoje.
        
         $reservas = DB::select('SELECT salas.sala, reservas.id, reservas.requisitante,reservas.hora_ini, reservas.hora_ter, reservas.data from salas, reservas WHERE  reservas.data > CURDATE() AND reservas.sala_id = salas.id');
        
        return view('futuras-reservas')->with('reservas', $reservas);
    }
    
    public function pesquisasalaReserva(){
        
        return view('pesquisa-reserva-sala')->with('sala', Sala::all()); 
    }
    
    public function pesquisandosalaReserva(PesquisasalaRequest $request){
         
         $params = $request->all();
         $reservas = new Reserva($params);
               
         $sala = $reservas->sala_id;
          
        //$pesquisa = Reserva::all()->where('sala_id', '=',$sala); //outro jeito de fazer querys
         $pesquisa = DB::select('SELECT salas.sala, reservas.id, reservas.requisitante,reservas.hora_ini, reservas.hora_ter, reservas.data from salas, reservas WHERE reservas.sala_id = salas.id AND sala_id = ?',[$sala]);
        //Query que seleciona a sala e o demais dados  
        
        if(empty($pesquisa)){
             return view('resultado-por-sala')->with('pesquisa', $pesquisa);
        }else{
        for($i = 0; $i<count($pesquisa); $i++)
                 {
                   $nomeSala= $pesquisa[$i]->sala;  // pega o nome da sala
                }
                 
         
         return view('resultado-por-sala')->with('pesquisa', $pesquisa)->with('nomeSala',$nomeSala);
        }
    }
    
    public function pesquisadataReserva()
    {
        return view('pesquisa-reserva-data');
    }
    
    public function pesquisandodataReserva(PesquisadataRequest $request)
    {
         $params = $request->all();
         $reservas = new Reserva($params);
         $data = $reservas->data;
        
        $pesquisa = Reserva::all()->where('data', '=',$data);
        
         return view('resultado-por-data')->with('pesquisa',$pesquisa)->with('data',$data);
    }
    
    public function minhasReservas()
    {
      $id_user = Auth::user()->id;
        
        $reservas = Reserva::all()->where('user_id', '=', $id_user);
        
        return view('minhas-reservas')->with('reservas',$reservas);
    }
}
