<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas'; 
    public $timestamps = false;
    
     protected $fillable = array('sala','pc','projetor'); // passa o que pode ser mudado pelo usuario
    
     public function reserva(){
       return $this->hasMany('App\Reserva','id');
         // uma reserva pode ter várias opções de salas
    }
    
    public function item(){
       return $this->hasMany('App\Item','id');
         // uma reserva pode ter várias opções de salas
    }
}

