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
               
        
        
        for($i=0; $i<count($urls); $i++)
        {
            $this->busqueda_id = $busqueda_id;
            $this->url = $urls[$i];
            $flag = $this->save();
        	if(!$flag){
        		return false;
        	}
        }
        return true;

    }
}
