<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table = 'contenidos';
    protected $fillable = ['url', 'busquedas_id'];


    public function saveContenido($busqueda_id, $urls)
    {
        
        DB::beginTransaction();
        
        $this->busquedas_id = $busqueda_id;
        $this->url = $urls[0];
        
        for($i=0; $i<count($urls); $i++)
        {
        	$this->busqueda_id = $busqueda_id;
            $this->url = $urls[$i];
        	if(!$this->save()){
        		DB::rollback();
        	}else{
        		DB::commit();
        	}
        }
    }
}
