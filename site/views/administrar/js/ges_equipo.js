$(document).ready(function(){
 
//-------------------------------------------------------------------------------------------
	if ($("#buscar_de_ges_equipo").val()!="") {

		buscar($("#buscar_de_ges_equipo").val());


	}


//-------------------------------------------------------------------------------------------






 	//***-------------------------------------------------------------------------------
	$(document).on("keyup","#buscar_de_ges_equipo",function()
	{

		var valor=this.value;   
		buscar(valor);
		
	});
	//***-------------------------------------------------------------------------------
	$(document).on("click","#eliminar_equipo",function()
	{
		var id=this.dataset.id;
		alertify.confirm("¿Desea realmente eliminar este equipo?", function (e)
		{
			if (e) 
			{
				$.post(base_url+"administrar/eliminar_producto",{"valor": id},function()
				{
				window.location.href=base_url+"administrar/ges_equipo/"+$("#buscar_de_ges_equipo").val();
				});
				alertify.success("Equipo eliminado exitosamente.");
			}else
			{
				alertify.error("Ha cancelado.");
			}
		});



	});
	//***-------------------------------------------------------------------------------



	$(document).on("click","#editar_equipo",function()
	{
		var valor=this.dataset.id;  
		window.location.href=base_url+"administrar/update_equipo/"+valor;
	});


	//-------------------------------------------------------------------------------------------

function buscar(valor){

var html='<table class="table table-striped"><thead>.';

		html+='<th>Nombre</th><th>Marca</th><th>Modelo</th><th>Acciones</th></thead><tbody>';


		$.post(base_url+'/administrar/buscar_equipo', {'valor': valor }, function(datos)
		{

			if(datos=="")
			{
				$("#resultados").html("<div class='mensasaje'>No hay resultados para su busqueda</div>");
				return;
			}
			for (var i = 0; i < datos.length ; i++)
			{
			html+='<tr><td>'+datos[i].nombre+'</td><td>'+datos[i].marca+'</td><td>'+datos[i].modelo+'</td><td>';
			html+='<span data-id="'+datos[i].id_producto+'" id="editar_equipo" class="glyphicon glyphicon-pencil botonmm" aria-hidden="true"></span> <span id="eliminar_equipo" data-id="'+datos[i].id_producto+'" class="glyphicon glyphicon-trash botonmm" aria-hidden="true"></span></td></tr>';
			}
		html+='</tbody></table>';
		$("#resultados").html(html);
		},"json");

}


//-------------------------------------------------------------------------------------------











});