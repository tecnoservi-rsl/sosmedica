
$(document).ready(function(){


$('#nombre').addClass('validate[required]');
$('#presentacion').addClass('validate[required]');
$('#marca').addClass('validate[required]');
$('#categoria').addClass('validate[required]');
$('#files').addClass('validate[required]');



$('#form_agregar_producto').validationEngine();



});