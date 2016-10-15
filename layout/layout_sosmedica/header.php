<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
    <!--Core CSS -->
    <link href="<?php echo BASE_URL; ?>public/css/alertify.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/alertify.core.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.structure.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.theme.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>layout/layout3/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Plugin CSS -->
    <!-- Custom CSS -->
    <link href="<?php echo $_layoutParams['ruta_css']; ?>layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_layoutParams['ruta_css']; ?>botones.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo $_layoutParams['ruta_css']; ?>formulario.css" rel="stylesheet" type="text/css" />
    <!-- CSS view.. -->
    <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
        <?php for($i=0; $i < count($_layoutParams['css']); $i++): ?>
            <link href="<?php echo $_layoutParams['css'][$i] ?>" rel="stylesheet" type="text/css" />
        <?php endfor; ?>
    <?php endif; ?> 
</head>

<body id="page-top">

<div class="container">

<div class="container-fluid"> 
    <div class="col-md-4">
    <header>
        <div class="header-content">
            <a id="header_logo" href="http://www.sosmedica.com.ve/" title="SOSMEDICA.COM"> <img class="img-responsive" alt="Responsive image" src="layout/layout_sosmedica/img/sosmedica.jpg" alt="SOSMEDICA.COM"  width="250" height="99"> </a>
        </div>
    </header>
    </div>

    <div class="col-md-3 buscar">
      <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar...">
      <span class="input-group-btn">
        <button class="btn btn-default btnbuscar" type="button">Buscar</button>
      </span>
    </div><!-- /input-group -->
    </div>
</div>
</div>
<div class="container menu-completo">
<div class="container-fluid menu-sos">
   <ul class="nav nav-pills">
  
  <li role="presentation"> <a href="#">INICIO</a></li>
  <li role="presentation"> <a href="#">CATEGORIAS</a></li>
  <li role="presentation"> <a href="#">MARCAS</a></li>
  <li role="presentation"> <a href="#">CONTACTO</a></li>
  
</ul>
</div>
</div>

    <div class="container-fluid fondo">

    <input type="hidden" value="<?php echo Session::get('role');?>" id="_ROL_">

    <div class="row">



   


        
