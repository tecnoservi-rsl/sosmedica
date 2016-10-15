$(document).ready(function(){


	$(document).on("blur","#cedula",function(){


			$.get(base_url+"venta/buscar",{


				'cedula'   :  $("#cedula").val()

			},function(datos){
				if (datos==false) {
					$(".fixer").html("<center><b>Datos de compras</center></b><br>");
					$('#nombres').val('');
					$('#coord').val('');
					return;
				}

			
$('#vn').val(datos['persona'].id_persona);
$('#nombres').val(datos['persona'].nombres);
$('#coord').val(datos['persona'].coordinacion);

var html='<center><b>Ultima Compra</b></center><br>'
html+='<b>Fecha:</b><br>';
html+=datos['producto'].fecha+"<br>";
html+='<b>Productos:</b><br>';
html+=datos['producto'].producto+"<br>";
html+='<b>Total de la compra:</b><br>';
html+=datos['producto'].total+" Bs<br>";
html+='<b>Abono de la compra:</b><br>';
html+=datos['producto'].abono+" Bs<br>";
html+='<b>Debe:</b><br>';
html+=datos['producto'].resta+" Bs<br>";



$(".fixer").html(html);




			},'json');


			});


	$(document).on("click","#registrar_venta",function(){


			$.get(base_url+"venta/guardar_venta",{

				'vn'   :  $("#vn").val(),
				'cedula'   :  $("#cedula").val(),		
				'nombres'  :  $("#nombres").val(),		
				'coord'    :  $("#coord").val(),		
				'producto' :  $("#producto").val(),
				'total'    :  $("#total").val(),		
				'abono'    :  $("#abono").val()

			},function(){

			location.reload();

			});


			});

});
		

	