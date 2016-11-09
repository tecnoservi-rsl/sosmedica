
$(document).ready(function(){


function guardar(valor){


  $.post(base_url+'administrar/guardar_categoria', {'valor': valor }, function(datos) {
    


    var html="";

 html += '<option value="">--> Seleccione <--</option>';
    for (var i = 0; i < datos['categorias'].length ; i++) {


 html += '<option value="'+datos['categorias'][i]['id_categoria']+'">'+datos['categorias'][i]['categoria']+'</option>';

      console.log(datos['categorias'][i]);
      
    }


$("#categoria").html(html);

  },"json");



}


function guardarmarca_producto(valor){


  $.post(base_url+'administrar/guardar_marca', {'valor': valor }, function(datos) {
    


    var html="";

 html += '<option value="">--> Seleccione <--</option>';
    for (var i = 0; i < datos['marcas'].length ; i++) {


 html += '<option value="'+datos['marcas'][i]['id_marca']+'">'+datos['marcas'][i]['marca']+'</option>';

      console.log(datos['marcas'][i]);
      
    }


$("#marca_producto").html(html);

  },"json");



}

function guardarmarca_equipo(valor){


  $.post(base_url+'administrar/guardar_marca_equipo', {'valor': valor }, function(datos) {
    


    var html="";

 html += '<option value="">--> Seleccione <--</option>';
    for (var i = 0; i < datos['marcas'].length ; i++) {


 html += '<option value="'+datos['marcas'][i]['id_marca']+'">'+datos['marcas'][i]['marca']+'</option>';

      console.log(datos['marcas'][i]);
      
    }


$("#marca_equipo").html(html);

  },"json");



}


$(document).on("click","#agregar_categoria",function(){

alertify.prompt("Inserte el nombre de la categoria", function (e, str) {
               if (e) {


                  guardar(str);

                  alertify.success("Has cargado la categoria: " + str);
               } else {
                  alertify.error("Has cancelado :(");
               }
            }, " ");

});

$(document).on("click","#agregar_marca_producto",function(){

alertify.prompt("Inserte el nombre de la marca", function (e, str) {
               if (e) {


                guardarmarca_producto(str);

                  alertify.success("Has cargado la marca: " + str);
               } else {
                  alertify.error("Has cancelado :(");
               }
            }, " ");

});


$(document).on("click","#agregar_marca_equipo",function(){

alertify.prompt("Inserte el nombre de la marca", function (e, str) {
               if (e) {


                guardarmarca_equipo(str);

                  alertify.success("Has cargado la marca: " + str);
               } else {
                  alertify.error("Has cancelado :(");
               }
            }, " ");

});

$(document).on("click","#eliminar_categoria",function(){

var id=$("#categoria").val();


   alertify.confirm("¿Desea realmente eliminar esta Categoria?", function (e) {
               if (e) {


                $.post(base_url+"administrar/eliminar_categoria",{"valor": id},function(datos){
    

    var html="";

 html += '<option value="">--> Seleccione <--</option>';
    for (var i = 0; i < datos['categorias'].length ; i++) {


 html += '<option value="'+datos['categorias'][i]['id_categoria']+'">'+datos['categorias'][i]['categoria']+'</option>';

      console.log(datos['categorias'][i]);
      
    }


$("#categoria").html(html);

  },"json");

                  alertify.success("El registro ha sido eliminado exitosamente");
               } else {
                  alertify.error("Ha cancelado :(");
               }
            });

});


$(document).on("click","#eliminar_marca_producto",function(){

var id=$("#marca_producto").val();

   alertify.confirm("¿Desea realmente eliminar esta marca?", function (e) {
               if (e) {


                $.post(base_url+"administrar/eliminar_marca",{"valor": id},function(datos) {
    


    var html="";

 html += '<option value="">--> Seleccione <--</option>';
    for (var i = 0; i < datos['marcas'].length ; i++) {


 html += '<option value="'+datos['marcas'][i]['id_marca']+'">'+datos['marcas'][i]['marca']+'</option>';

      console.log(datos['marcas'][i]);
      
    }


$("#marca_producto").html(html);

  },"json");


                  alertify.success("El registro ha sido eliminado exitosamente");
               } else {
                  alertify.error("Ha cancelado :(");
               }
            });
});

$(document).on("click","#eliminar_marca_equipo",function(){

var id=$("#marca_equipo").val();

   alertify.confirm("¿Desea realmente eliminar esta marca?", function (e) {
               if (e) {


                $.post(base_url+"administrar/eliminar_marca_equipo",{"valor": id},function(datos) {
    


    var html="";

 html += '<option value="">--> Seleccione <--</option>';
    for (var i = 0; i < datos['marcas'].length ; i++) {


 html += '<option value="'+datos['marcas'][i]['id_marca']+'">'+datos['marcas'][i]['marca']+'</option>';

      console.log(datos['marcas'][i]);
      
    }


$("#marca_equipo").html(html);

  },"json");


                  alertify.success("El registro ha sido eliminado exitosamente");
               } else {
                  alertify.error("Ha cancelado :(");
               }
            });
});

});