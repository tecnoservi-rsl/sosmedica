$(document).ready(function(){



			$(document).on("click","#opt_",function(){


			var controler=this.dataset.controller;
			var accion=this.dataset.accion;

			document.location=base_url+controler+"?accion="+accion;


			});


		






});