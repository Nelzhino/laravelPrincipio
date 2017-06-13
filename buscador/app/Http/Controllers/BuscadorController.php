<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Note;

class BuscadorController extends Controller
{
    
    public function store()
    {
      return 'dkfkndfkdsfjsd';
       /*$this->validate(request(), [
            'note' => ['required', 'max:200']
       ]); 
       $data = request()->all();

       Note::create($data);

       return redirect()->to('notes');*/
    }
    
}