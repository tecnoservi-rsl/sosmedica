$(document).ready(function(){


	$(document).on("click","#buscar_inicio",function(){

	
		window.location=base_url+"productos/search_product/1/like/"+$("#buscar-like").val();


	});



});