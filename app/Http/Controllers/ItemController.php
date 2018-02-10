<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\DB;
use App\Sala;
use App\Item;
use App\Reserva;
use Validator;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\PesquisaItemRequest;
use App\Http\Requests\tomboRequest;
use Auth;

class ItemController extends Controller
{
    
    public function __construct() {       
        $this->middleware('AdmMiddleware');  //apenas adm's podem acessar estas rotas e métodos
    } 

    
    public function viewCadastroItem(){
    
    return view('formulario-Item')->with('sala', Sala::all());
    }
    
    public function verificaItem(ItemRequest $request){
    
              $params = $request->all(); // pega todos os parametros da requisição, 
              $itens = new Item($params); //vai criar um array com todos os dados para o eloquent inserir no banco
    
              $tombo = $itens->tombo;
    
              $dados = DB::select('SELECT tombo FROM itens WHERE tombo = ?',array($tombo));
        
             if(empty($dados )){
                 $itens->save();
                // echo'insere';
                return redirect()->action('ItemController@viewItemCadastrado');
             }else{
                 return redirect()->action('ItemController@viewItemNaoCadastrado');
             }
    }
    public function viewItemCadastrado()
    {
        return view('view-item-cadastrado');
    }
    
    public function viewItemNaoCadastrado()
    {
        return view('view-item-nao-cadastrado');
    }
    
     public function viewVerItem()
    {
        return view('pesquisa-item-sala')->with('sala', Sala::all());
    }
     public function pesquisaSalaItem(PesquisaItemRequest $request)
    {
              $params = $request->all(); // pega todos os parametros da requisição, 
              $itens = new Item($params); //vai criar um array com todos os dados para o eloquent inserir no banco
    
              $sala_id = $itens->sala_id;
        
           
          $pesquisa = DB::select('SELECT * FROM itens, salas WHERE itens.sala_id=? AND itens.sala_id = salas.id',[$sala_id]);
              
            
                if(empty($pesquisa)){
                     return view('resultado-item-pesquisa')->with('pesquisa',$pesquisa);
                }else{
                for($i = 0; $i<count($pesquisa); $i++)
                 {
                   $sala= $pesquisa[$i]->sala;
                    // pega o nome da sala
        
                }
                     
                
                return view('resultado-item-pesquisa')->with('pesquisa',$pesquisa)->with('sala',$sala);
                }
    }
        public function viewPesquisaTombo(){
            return view('pesquisa-item-tombo');
            
        }
    public function pesquisaTombo(tomboRequest $request){
    
         $params = $request->all(); // pega todos os parametros da requisição, 
         $itens = new Item($params); //
        
         $tombo = $itens->tombo;
        $pesquisa = DB::select('SELECT * FROM itens, salas WHERE tombo = ? AND itens.sala_id = salas.id',[$tombo]);
       
        return view('resultado-item-tombo')->with('pesquisa',$pesquisa)->with('tombo',$tombo);
    }
}
