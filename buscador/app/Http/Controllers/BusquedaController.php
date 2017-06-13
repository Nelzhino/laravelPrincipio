<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contenido;
use App\Busqueda;

use GuzzleHttp\Client;

class BusquedaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $busca = trim($request->txtBuscador);
        $dataUrl = null;
        $dataUrl = $this->consumeService($busca);
        /*if($busca != "")
        {
            $dataUrl = $this->consumeService($busca);

            DB::beginTransaction();

            $busqueda = new Busqueda;
            $busqueda->palabras = $busca;

            if($busqueda->save())
            {
                if(count($dataUrl['urlBusqueda']) != 0){
                    $contenido = new Contenido;
                    if($contenido->saveContenido($busqueda->id, $dataUrl['urlBusqueda']))
                    {
                        DB::commit();         
                    }
                }
                
            }else{
                DB::rollback();
            }    
        }*/

        return view('buscador', compact('dataUrl'));       
    }


    private function consumeService ($search)
    {
        
        $client = new Client([
            'base_uri' => env('CONEC_SERVICE') // Base URI is used with relative requests
        ]);   

        $response = $client->request('POST', 'getListado', [
            'json' => ['contenido' => $search, 
                        'urlBusqueda' => null]
        ]);

        return json_decode($response->getBody()->getContents(), true);

    }

}
