<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autentication extends Model
{
    public $timestamps = false;
     protected $table = 'autenticacoes';
    
    protected $fillable = array('password1','email1'); // passa o que pode ser mudado pelo usuario
}
