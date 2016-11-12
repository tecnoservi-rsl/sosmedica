$(document).ready(function(){



$(document).on("click","#opt_",function(){


			var accion=this.dataset.accion;

			document.location=base_url+"administrar"+"/"+accion;


			});




});