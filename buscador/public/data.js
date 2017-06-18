$(document).ready(function(){
	var _token = $('input[name="_token"]').val();
	$("#dangerException").hide();

	$("#txtBuscador").on('focus', function() {
		$("#dangerException").hide();
	});

	$('#formid').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) { 
			e.preventDefault();
			return false;
		}
	});

	$("#lnkHistorial").on('click', function(){
		$("#cmHistorial").empty();
		$.ajax({
			type:'GET',
			url: '/historial',
			success: function(response){
				createTableInformacion("#cmHistorial", response, 1);
			}
    	});
	});

	$("#btnBuscar").on('click', function(){
		$("#cmBuscar").empty();
		$.ajax({
			type: 'POST',
			url: '/busca',
			data:{
				"_token": _token,
				"txtBuscador": $('#txtBuscador').val()
			},
			success: function(response){
				if (typeof response.error === 'undefined'){
					var dataTable = [{
						"palabras": response.dataUrl.contenido,
						"contenidos": response.dataUrl.urlBusqueda
					}]
					createTableInformacion("#cmBuscar", dataTable, 0);
				}else{
					$("#dangerException").show();
				}
			}
    	});
	});
});

/*
	Creeacion de la tabla de Informacion.
*/
function createTableInformacion(index,busqueda,flag){
	var str = "";
	for (var i = 0; i < busqueda.length; i++) {
		str += "<tr><td rowspan=4>"+busqueda[i].palabras+"</td><td>";
		for (var j = 0; j < busqueda[i].contenidos.length; j++) {
			if(flag === 1)
				str += "<tr><td><a href='"+busqueda[i].contenidos[j].url+"'>"+busqueda[i].contenidos[j].url+"</a></td></tr>";
			else
				str += "<tr><td><a href='"+busqueda[i].contenidos[j]+"'>"+busqueda[i].contenidos[j]+"</a></td></tr>";
			
		}
		str += "</td></tr>"; 
	}

	$(index).append(str);
}
