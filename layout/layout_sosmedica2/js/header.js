$(document).ready(function(){


	$(document).on("click","#buscar_inicio",function(){

	
		window.location=base_url+"productos/search_product/like/"+$("#buscar-like").val();


	});



});