<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
     public $timestamps = false;
     protected $table = 'reservas';
    
  

    
    protected $fillable = array('sala_id','requisitante','hora_ini','hora_ter','data','descricao','user_id'); // passa o que pode ser mudado pelo usuario
    
    
    public function sala(){
       
       return $this->belongsTo('App\Sala','sala_id','id');
    }
    
    public function user(){
       
       return $this->belongsTo('App\User','user_id','id');
    }
    
}
?>