$(document).ready(function(){


	$(document).on("click","#buscar_inicio",function(){

	
		window.location=base_url+"productos/search_product/1/like/"+$("#buscar-like").val();


	});


/*        $menu = $('#mainNav').find('ul').find('li');
 
        $menu.hover(function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideDown();
        }, function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideUp();
        });
*/

});