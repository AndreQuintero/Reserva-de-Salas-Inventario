<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('reservas', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('requisitante',100)->default('teste');
            $table->string('descricao',255);
            $table->time('hora_ini');
            $table->time('hora_ter');
            $table->date('data'); 
          
        });
    }
        
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservas');

    }
}
