<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table = 'contenidos';
    protected $fillable = ['url'];
    //protected $hidden = ['busqueda_id', 'created_at', 'updated_at'];



    public function busqueda(){
        return $this->belongsTo('App\Busqueda');
    }

    public function saveContenido($busqueda_id, $urls)
    {
        
        DB::beginTransaction();
        
        $this->busqueda_id = $busqueda_id;
        
        for($i=0; $i<count($urls); $i++)
        {
            $this->url = $urls[$i];
        	if(!$this->save()){
        		DB::rollback();
        	}else{
        		DB::commit();
        	}
        }
    }
}
