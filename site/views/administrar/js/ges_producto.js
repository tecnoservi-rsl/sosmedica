$(document).ready(function(){

//-------------------------------------------------------------------------------------------
	$(document).on("keyup","#buscar_de_ges_produc",function()
	{
		var valor=this.value;   
		var html='<table class="table table-striped"><thead>.';
		html+='<th>Nombre</th><th>Presentacion</th><th>Marca</th><th>Categoria</th><th>Acciones</th></thead><tbody>';
		$.post(base_url+'/administrar/buscar_producto', {'valor': valor }, function(datos)
		{
			if(datos=="")
			{
				$("#resultados").html("<div class='mensasaje'>no hay resultados para su busqueda</div>");
				return;
			}
			for (var i = 0; i < datos.length ; i++)
			{
				html+='<tr><td>'+datos[i].nombre+'</td><td>'+datos[i].presentacion+'</td>><td>'+datos[i].marca+'</td><td>'+datos[i].categoria+'</td><td>';
				html+='<span id="editar_producto" data-id="'+datos[i].id_producto+'" class="glyphicon glyphicon-pencil botonmm" aria-hidden="true"></span> <span id="eliminar_producto" data-id="'+datos[i].id_producto+'" class="glyphicon glyphicon-trash botonmm" aria-hidden="true"></span></td></tr>';
			}
			html+='</tbody></table>';
			$("#resultados").html(html);
		},"json");
	});


//-------------------------------------------------------------------------------------------

	$(document).on("click","#eliminar_producto",function()
	{
		var id=this.dataset.id;
		alertify.confirm("This is a confirm dialog", function (e)
		{
			if (e)
			{
				$.post(base_url+"administrar/eliminar_producto",{"valor": id},function(){
					location.reload();
				});
				alertify.success("OK");
			}else
			{
				alertify.error("Cancel");
			}
		});
	});

//-------------------------------------------------------------------------------------------


	$(document).on("click","#editar_producto",function()
	{
		var valor=this.dataset.id;  
		window.location.href=base_url+"administrar/uptade_producto/"+valor;
	});


//-------------------------------------------------------------------------------------------







});