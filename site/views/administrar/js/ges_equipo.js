$(document).ready(function(){
 
 	//***-------------------------------------------------------------------------------
	$(document).on("keyup","#buscar_de_ges_equipo",function()
	{

		var valor=this.value;   
		var html='<table class="table table-striped"><thead>.';

		html+='<th>Nombre</th><th>Marca</th><th>Modelo</th><th>Acciones</th></thead><tbody>';


		$.post(base_url+'/administrar/buscar_equipo', {'valor': valor }, function(datos)
		{
			for (var i = 0; i < datos.length ; i++)
			{
			html+='<tr><td>'+datos[i].nombre+'</td><td>'+datos[i].marca+'</td>><td>'+datos[i].modelo+'</td><td>';
			html+='<span data-id="'+datos[i].id_producto+'" id="editar_equipo" class="glyphicon glyphicon-pencil botonmm" aria-hidden="true"></span> <span id="eliminar_equipo" data-id="'+datos[i].id_producto+'" class="glyphicon glyphicon-trash botonmm" aria-hidden="true"></span></td></tr>';
			}
		html+='</tbody></table>';
		$("#resultados").html(html);
		},"json");
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
				location.reload();
				});
				alertify.success("El registro ha sido eliminado correctamente");
			}else
			{
				alertify.error("Ha cancelado la accion eliminar");
			}
		});



	});
	//***-------------------------------------------------------------------------------



	$(document).on("click","#editar_equipo",function()
	{
		var valor=this.dataset.id;  
		window.location.href=base_url+"administrar/uptade_equipo/"+valor;
	});


	//-------------------------------------------------------------------------------------------












});