@extends('layout')

@section('content')
    <form id="formid">
    	{!! csrf_field() !!}
        <div class="form-group">
            <label for="txtBuscador">Digite lo que desea buscar:</label>
            <input type="text" class="form-control" id="txtBuscador" name="txtBuscador" placeholder="Escribir..." autocomplete="off">
        </div>

        <button type="button" class="btn btn-default" id="btnBuscar">Buscar</button>
	</form>
	<br>
		
	<div class="alert alert-danger alert-dismissable" id="dangerException">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Danger!</strong>  Hay problemas con la conexion del Web Service.
	</div>

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
			<h4>Resultados obtenido</h4> 
	    	<table class="table table-striped">
			  	<thead>
			    	<tr>
			      		<th>Busqueda</th>
			      		<th>Contenidos</th>
			    	</tr>
			  	</thead>
			  	<tbody id="cmBuscar">
			  	</tbody>
			</table>

		</div>
		
		<div id="historial" class="tab-pane fade">
			<h4>Historial de busqueda</h4> 
			<table class="table table-striped">
				  	<thead>
				    	<tr>
				      		<th>Busqueda</th>
				      		<th>Contenidos</th>
				    	</tr>
				  	</thead>
				  	<tbody id="cmHistorial">
				  	</tbody>
			</table>
		</div>
	</div>
@endsection