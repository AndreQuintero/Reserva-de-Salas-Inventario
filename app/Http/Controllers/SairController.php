<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SairController extends Controller
{
    public function sair(){
        
        Auth::logout();
        return redirect('/login');
    }
}
