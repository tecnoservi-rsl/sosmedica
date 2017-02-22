$(document).ready(function(){


 $("#owl-demo").owlCarousel({

      navigation : false, // Show next and prev buttons
      slideSpeed : 500,
      paginationSpeed : 400,
      singleItem:true,
      autoPlay: true,
      stopOnHover: true,
      paginationNumbers: true,
      transitionStyle: "fadeUp"

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

  });
			$(document).on("click","#opt_",function(){


			var controler=this.dataset.controller;
			var accion=this.dataset.accion;

			document.location=base_url+controler+"?accion="+accion;


			});


		






});