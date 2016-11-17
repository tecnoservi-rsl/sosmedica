$(document).ready(function(){

	$('#nombre').addClass('validate[required]');
	$('#marca').addClass('validate[required]');
	$('#modelo').addClass('validate[required]');
	$('#descripcion').addClass('validate[required]');
	$('#form_agregar_producto').validationEngine();

	$('#slider1').tinycarousel();
	var id_producto=$("#id_producto").val();
	var cant_fotos=$("#cantidad").val();
	
	

$('.disponibilidad').iphoneStyle({
  checkedLabel: 'SI',
  uncheckedLabel: 'NO'
});



//................................................................................................

function archivo(input)
{
  $("div#prevista").remove();
  $('#list').addClass('active');
  reader=Array();
  for (var i = 0; i < input.files.length ;  i++)
  {
    reader[i] = new FileReader();
    reader[i].numero= i;
    reader[i].onloadstart= function(){

      $('#list').after('<div id="cargarr'+this.numero+'" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ">img ==='+this.numero+'</div>' );

    }
    reader[i].onloadend= function(){

      $('div#cargarr'+this.numero).remove();
    }
    reader[i].onload= function()
    {
      $('#list').after('<div id="prevista" class="prviuw"><img class="" width="100px" height="100px" src="'+this.result+' " ></div>' );
    }
    reader[i].readAsDataURL(input.files[i]);
  }

  console.log(reader);
}

$('#files').change(function()
{
  archivo(this);
});
//................................................................................................

$(document).on('click', '.glyphicon-remove-sign', function() {
			

		var selector = this.id;
		var id=this.dataset.id;
		
		//--------------------------eliminar nodo y img en la bd-------------
		$.get(base_url+'administrar/eliminar_foto',{"valor":id});
		$("."+selector).parent().addClass("hidden");
		//---------------------------------------

		if(cant_fotos > 4){	
		//--------------------------disminuir la cantidad de espacio en la scroll del carrucel------------
		var ancho=$(".overview")[0].style.width;
		var aux= ancho.split("px");
		console.log(aux[0]);
		var resul= parseInt(aux[0])-102;
		$(".overview")[0].style.width=resul+"px";}
		//---------------------------------------
		cant_fotos--;

		console.log(cant_fotos)
		if (cant_fotos == 0) {

			html="<div id='mensaje_no_hay_fotos'> Debe cargar por lo menos una foto para ente producto </div>";
			$("#fotosmenos3").html(html);

		}

		if (cant_fotos < 4 && cant_fotos > 0) {


		//-------------------montar vista simple de img --------------------
		$.get(base_url+'administrar/trar_producto_con_foto_ajax',{"valor":id_producto}, function(data) {
		var html="";
		for (i=0; i < data.fotos.length ; i++){
		html+='<div id="menos_3">';
		html+='<img class="img-responsive pro-update-img" src="'+base_url+'public/img/publicaciones/'+data.fotos[i].nombre+'" />';
		html+=	'<span data-id="'+data.fotos[i].id_img_producto+'" class="glyphicon glyphicon-remove-sign pro-update-boton eliminar_'+i+'" id="'+i+'"  aria-hidden="true"></span></div>';
		}
		$("#fotosmenos3").html(html);
		},"json");
		//---------------------------------------


		}

});










});