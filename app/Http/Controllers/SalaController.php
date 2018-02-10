<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\DB;
use App\Sala;
use App\Item;
use Auth;
use App\Http\Requests\salaRequest;

class SalaController extends Controller
{
    
    public function listaSala()
    {
        $salas = Sala::all();
        
        return view('lista-de-salas')->with('salas', $salas);  // a primeira é a variavel da view e a segunda é a daqui
        
    }
    
    public function detalhesSala(){
        
        
            // voce pode colocar a variavel id no parametro e ocultar ela dps no codigo
        
            
           // $id = Request::input('id'); // Request pega os dados do url(no caso do método get)// pode ter um segundo valor, no caso um default, caso a pessoa passe o link sem nenhum parametro, ira mostrar o valor default, como se fosse a pag index
           $id = Request::route('id'); // aqui ao invés de pegar o GET, ele pega a própria url, no caso a variavel dentro do route tem que ser igual ao do arquivo route  
            
            //$produto = DB::select('SELECT * FROM produtos WHERE id =?',[$id]);
            $salas = Sala::find($id);
           
            $idSala = $salas->id;
            
            $itens = Item::all()->where('sala_id', '=',$idSala);
            
            return view('detalhes-da-sala')->with('s', $salas)->with('itens',$itens);
        }
    
     public function cadastroSalaView()
    {   
         if(Auth::user()->is_Adm == 1){
        return view('cadastroSala');  // a primeira é a variavel da view e a segunda é a daqui
         }else{
             return  redirect()->action('ReservaController@listaReserva');
         }
    }
    
    public function adicionaSala(salaRequest $request){
        
            if(Auth::user()->is_Adm == 1){
         $params = $request->all(); // pega todos os parametros da requisição, porem da erro de tokien, então vc deve ir na classe reserva e adicionar os nomes dos elementos dos campos do form 
              $salas = new Sala($params); 
               
                $numSala = $salas->sala;
                
                $pesquisa = DB::select('SELECT sala FROM salas WHERE sala=?',[$numSala]);
                
                if(empty($pesquisa)){
                $salas->save();
                
                return  redirect()->action('SalaController@listaSala')->withInput(Request::only('sala'));
                }else{
                    return view('erro-sala');
                }
            }else{
                 return  redirect()->action('ReservaController@listaReserva');
                 }
            
    }
   public function removeSala(){
            $id = Request::route('id');
            $sala = Sala::find($id); // acha a query da reserva no banco de dados
       
          
        if(Auth::user()->is_Adm == 1){
            $sala->delete();
            return redirect()->action('SalaController@listaSala');
        }else{
            return  redirect()->action('ReservaController@listaReserva');
        }
        
   }
    public function salasUsadas(){
        

        $salas = DB::select('SELECT salas.id, salas.sala, COUNT(*) as numReservas from salas, reservas WHERE salas.id = reservas.sala_id GROUP BY salas.id, salas.sala ORDER BY numReservas DESC');
        
       
        
        return view('salas-mais-usadas')->with('salas', $salas);
        
            
    }
    
}
?>
