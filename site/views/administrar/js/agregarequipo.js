
$(document).ready(function(){


        $('#nombre').addClass('validate[required]');
        $('#marca').addClass('validate[required]');
        $('#modelo').addClass('validate[required]');
        $('#files').addClass('validate[required]');
        $('#form_agregar_equipo').validationEngine();

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



        function guardarmarca(valor){

        $.post(base_url+'administrar/guardar_marca_equipo', {'valor': valor }, function(datos)
        {
                  var html="";
                  html += '<option value="">--> Seleccione <--</option>';
                          for (var i = 0; i < datos['marcas'].length ; i++)
                          {
                                  html += '<option value="'+datos['marcas'][i]['id_marca']+'">'+datos['marcas'][i]['marca']+'</option>';
                                  console.log(datos['marcas'][i]);
                          }
                  $("#marca").html(html);
                  },"json");
        }
//................................................................................................


        $(document).on("click","#agregar_marca",function()
        {
                alertify.prompt("Inserte el nombre de la marca", function (e, str) {
                if (e) {
                guardarmarca(str);
                alertify.success("Has cargado la marca: " + str);
                } else {
                alertify.error("Has cancelado :(");
                }
                }, " ");
        });

//................................................................................................



});