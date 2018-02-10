<?php

namespace App\Http\Controllers;
use App\User;
//use Illuminate\Http\Request;
use Auth;
use Request;
use Illuminate\Support\Facades\DB;  
use App\Http\Requests\registerRequest;
class UserController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('AdmMiddleware');
    }
    public function mostraUsuarios()
    {
        $users = User::all();
            
        return view('listaUsuarios')->with('users', $users);
    }
    public function removeUsuario(){
         $id = Request::route('id'); // fala que na rota haverá um id
         $usuarios = User::find($id); //encontra o id do usuário 
            
           if(Auth::user()->is_Adm == 1){
            $usuarios->delete();
            return redirect()->action('UserController@mostraUsuarios');
        }else{
            echo 'você não tem permissão para isso';
        }
        
    }
   
}
 