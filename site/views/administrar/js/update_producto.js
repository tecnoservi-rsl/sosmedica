$(document).ready(function(){

		$('#slider1').tinycarousel();
		var id_producto=$("#id_producto").val();
		var cant_fotos=$("#cantidad").val();
	
	

	

		$(document).on('click', '.glyphicon-remove-sign', function() {
			
		
			var selector = this.id;
			var id=this.dataset.id;


	$.get(base_url+'administrar/eliminar_foto',{"valor":id});


			$("."+selector).parent().addClass("hidden");

				if(cant_fotos > 4){	var ancho=$(".overview")[0].style.width;
					var aux= ancho.split("px");
		
					console.log(aux[0]);
		
					var resul= parseInt(aux[0])-102;
		
					$(".overview")[0].style.width=resul+"px";}

			cant_fotos--;


			if (cant_fotos < 4) {



							$.get(base_url+'administrar/trar_producto_con_foto_ajax',{"valor":id_producto}, function(data) {
			
			
							var html="";



							   for (i=0; i < data.fotos.length ; i++){
                html+='<div id="menos_3">';
          		html+='<img class="img-responsive pro-update-img" src="'+base_url+'public/img/publicaciones/'+data.fotos[i].nombre+'" />';
          		html+=	'<span data-id="'+data.fotos[i].id_img_producto+'" class="glyphicon glyphicon-remove-sign pro-update-boton eliminar_'+i+'" id="'+i+'"  aria-hidden="true"></span></div>';

								}

								$("#fotosmenos3").html(html);


							},"json");

}




		});










});