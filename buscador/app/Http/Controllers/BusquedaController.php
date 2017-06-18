<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contenido;
use App\Busqueda;
use App\Parametro;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class BusquedaController extends Controller
{


    // Contiene informacion correspondiente a los parametros del sistema.
    public function getParameters()
    {
        return view('buscador');
    }


    // Devuelve lo que se ha buscado 
    public function index()
    {
        return Busqueda::with('contenidos')->orderBy('created_at', 'DESC')->get();
    }


    // Metodo para guardar historial...
    public function store(Request $request)
    {
        $busca = trim($request->txtBuscador);
        $dataUrl = null;
        if($busca != "")
        {
            $dataUrl = $this->consumeService($busca);
        
            if($dataUrl != null){
                DB::beginTransaction();

                $busqueda = new Busqueda;
                $busqueda->palabras = $busca;

                if($busqueda->save())
                {
                    if(count($dataUrl['urlBusqueda']) != 0){
                        for($i=0; $i<count($dataUrl['urlBusqueda']); $i++)
                        {
                            $contenido = new Contenido;
                            $contenido->busqueda_id = $busqueda->id;
                            $contenido->url = $dataUrl['urlBusqueda'][$i];
                            if($contenido->save())
                            {
                                DB::commit();         
                            }else
                            {
                                DB::rollback();
                            }
                        }
                    }
                    
                }else{
                    DB::rollback();
                }
            }else{
                $error = [
                    'err' => -1,
                    'descripcion' => 'Error'
                ];

                return compact('error');
            }      
        }
        return compact('dataUrl');
            
    }


    private function consumeService ($search)
    {
        try{
            $client = new Client([
                'base_uri' => env('CONEC_SERVICE') // Base URI is used with relative requests
            ]);   

            $response = $client->request('POST', 'getListado', [
                'json' => ['contenido' => $search, 
                            'urlBusqueda' => null]
            ]);
        }catch(RequestException  $exception){
            return null;
        }
        
        return json_decode($response->getBody()->getContents(), true);

        

    }





}
