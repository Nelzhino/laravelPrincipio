$(document).ready(function(){
	$("#txtBuscador").on('focus', function() {
		$("#dangerException").hide();
	});


	$("#lnkHistorial").on('click', function(){
		$("#cm").empty();
		$.ajax({
        	url: "http://cms.course:8089/historial"
    	}).then(function(data) {
       		data.forEach(createTableInformacion);
    	});

	});
});

/*
	Creeacion del historial de busqueda.
*/
function createTableInformacion(busqueda, i){
	var str = "<tr>";
		str += "<td rowspan=4>"+busqueda.palabras+"</td><td>";

		busqueda.contenidos.forEach(function(contenido, j){
			str += "<tr><td><a href='"+contenido.url+"'>"+contenido.url+"</a></td></tr>"
		});
	str += "</td></tr>"; 
	
	$("#cm").append(str);
	str = "";
}