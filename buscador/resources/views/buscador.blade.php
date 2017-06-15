@extends('layout')

@section('content')
    
    <form action="{{ url('buscador')}}" method="post">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="txtBuscador">Digite lo que desea buscar:</label>
            <input type="text" class="form-control" id="txtBuscador" name="txtBuscador" placeholder="Escribir..." autocomplete="off">
        </div>

        <button type="submit" class="btn btn-default">Buscar</button>
	</form>

	<br>
	@if(! empty($error))
		<div class="alert alert-danger alert-dismissable" id="dangerException">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  			<strong>Danger!</strong>  Hay problemas con la conexion del Web Service.
		</div>
	@endif
	<br><hr>    
	<ul class="nav nav-tabs">
		<li class="active">
			<a data-toggle="tab" href="#home">Resultado Busqueda</a>
		</li>
		<li>
			<a data-toggle="tab" href="#historial" id="lnkHistorial">Historial Busqueda</a>
		</li>
	</ul>
	
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<!-- Valido inicialmente si hay datos -->
			<h3>Resultados</h3> 
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
				  				@if(! empty($dataUrl['urlBusqueda']))
				  					@for ($i=0; $i < count($dataUrl['urlBusqueda']); $i++)
						    			<tr>
							      			<td><a href='{{ $dataUrl['urlBusqueda'][$i] }}'>{{ $dataUrl['urlBusqueda'][$i] }}</a></td>
							    		</tr>
				    				@endfor
				  				@endif				
				  			</td>
			    		</tr>
				  	</tbody>
				</table>		
			@endif

		</div>
		
		<div id="historial" class="tab-pane fade">
			<h4>Aqui se encuentra todo el historial de busqueda</h4> 
			<table class="table table-striped">
				  	<thead>
				    	<tr>
				      		<th>Busqueda</th>
				      		<th>Contenidos</th>
				    	</tr>
				  	</thead>
				  	<tbody id="cm"></tbody>
			</table>
		</div>
		
		
	</div>
@endsection