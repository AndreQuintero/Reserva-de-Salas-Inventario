<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $table = 'itens'; 
    public $timestamps = false;
     protected $fillable = array('nome_item','tombo','sala_id','estado');
    
     public function sala(){
       
       return $this->belongsTo('App\Sala','sala_id','id');
    }
    
}
