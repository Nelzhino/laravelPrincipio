@extends('layout')

@section('content')
    
    <form action="{{ url('buscador')}}" method="post">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="txtBuscador">Digite lo que desea buscar:</label>
            <input type="text" class="form-control" id="txtBuscador" name="txtBuscador" placeholder="Escribir...">
        </div>

        <button type="submit" class="btn btn-default">Buscar</button>
	</form>

	
	<br><hr>    


	@if( ! empty($dataUrl))
    	<table class="table table-striped">
		  	<thead>
		    	<tr>
		      		<th>Busqueda</th>
		      		<th>Contenidos</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<tr>
		  			<td rowspan="4">{{$dataUrl['contenido']}}</td>
		  			<td>
		  				@for ($i=0; $i < count($dataUrl['urlBusqueda']); $i++)
			    			<tr>
				      			<td>{{ $dataUrl['urlBusqueda'][$i] }}</td>
				    		</tr>
		    			@endfor
		  			</td>
	    		</tr>
		  	</tbody>
		</table>		
	@endif

@endsection