$(document).ready(function(){
 

	$(document).ready(function(){

			var valor=this.value;   
			var html;
		

 
		$.post(base_url+'/administrar/buscar_almacenes', {}, function(datos){
			if(datos.length != 0){
				
				for (var i = 0; i < datos.length ; i++) {
			


			html+='<tr><td>'+datos[i].nombre+'</td><td>'+datos[i].direccion+'</td><td>'+datos[i].telefono+'</td><td>'+datos[i].horario+'</td><td>';
			html+='<span class="glyphicon glyphicon-pencil botonmm" aria-hidden="true"></span> <span id="eliminar_almacen" data-id="'+datos[i].id_almacen+'" class="glyphicon glyphicon-trash botonmm" aria-hidden="true"></span></td></tr>';


				}


				$("#cuerpotabla").html(html);



				}else{
				html="<tr><td colspan='5'><center><h3>No hay almacenes registrados...</h3> </center></td></tr>";

				$("#cuerpotabla").html(html);

				}

			},"json");

			






	});




$(document).on("click","#eliminar_almacen",function(){

var id=this.dataset.id;


   alertify.confirm("¿Desea realmente eliminar este almacen?", function (e) {
               if (e) {


                $.post(base_url+"administrar/eliminar_almacen",{"valor": id},function(){

                  location.reload();

                });

                  alertify.success("El registro ha sido eliminado correctamente");
               } else {
                  alertify.error("Ha cancelado la accion eliminar");
               }
            });



});











});