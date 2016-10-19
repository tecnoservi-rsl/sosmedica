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
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>public/img/favicon1.png">
    <link href="<?php echo BASE_URL; ?>public/css/alertify.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/alertify.core.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.structure.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/tinycarousel.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/slides.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/redessociales.css">
    <link href="<?php echo BASE_URL; ?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.theme.css" rel="stylesheet" type="text/css" />
    <!-- Plugin CSS -->
    <!-- Custom CSS -->
    <link href="<?php echo $_layoutParams['ruta_css']; ?>layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_layoutParams['ruta_css']; ?>botones.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo $_layoutParams['ruta_css']; ?>formulario.css" rel="stylesheet" type="text/css" />
<!-- Redes sociales.. -->


    <!-- CSS view.. -->

    <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
        <?php for($i=0; $i < count($_layoutParams['css']); $i++): ?>
            <link href="<?php echo $_layoutParams['css'][$i] ?>" rel="stylesheet" type="text/css" />
        <?php endfor; ?>
    <?php endif; ?> 
</head>

<body id="page-top">
<a href="#" class="scroll-top hidden-xs hidden-md"></a>
<div class="container">

<div class="container-fluid"> 
    <div class="col-md-4">
    <header>
        <div class="header-content">
            <a id="header_logo" href="http://www.sosmedica.com.ve/" title="SOSMEDICA.COM"> <img class="img-responsive" alt="Responsive image" src="<?php echo BASE_URL; ?>layout/layout_sosmedica/img/sosmedica.jpg" alt="SOSMEDICA.COM"  width="250" height="99"> </a>
        </div>
    </header>
    </div>

    <div class="col-md-3 buscar">
      <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar...">
      <span class="input-group-btn">
        <button class="btn btn-default btnbuscar" id="buscar_inicio" type="button">Buscar</button>
      </span>
    </div><!-- /input-group -->
    </div>
</div>
</div>
<div class="container">
<div class="row">
    <nav id="mainNav" class="navbar navbar-default ">
                    <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul id="menu" class="nav navbar-nav">

                <li data-submenu-id="submenu-patas"> <a href="<?php echo BASE_URL?>">Inicio</a></li>
                       
            <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Categorias
                </a>
                
                <ul class="dropdown-menu menu-header" role="menu">
                    
                        <?php for($i = 0; $i < count($this->cama['categorias']); $i++): ?>
                           

                            <li data-submenu-id="submenu-patas"> <a href="<?php echo BASE_URL?>productos/search_product/<?php  echo $this->cama['categorias'][$i]['id_categoria'];?>"><?php  echo $this->cama['categorias'][$i]['categoria'];?></a></li>

                            <?php endfor; ?>
                    
                </ul>
            </li>

            <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Marcas
                </a>
                
                <ul class="dropdown-menu menu-header" role="menu">
                     <?php for($i = 0; $i < count($this->cama['marcas']); $i++): ?>
                           

                            <li data-submenu-id="submenu-patas"> <a href="#"><?php  echo $this->cama['marcas'][$i]['marca']; ?></a></li>

                            <?php endfor; ?>
                </ul>
            </li>



                        <?php if(isset($_layoutParams['menu'])): ?>
                            <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
                           

                            <li><a href="<?php echo BASE_URL.$_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>

                            <?php endfor; ?>
                            <?php endif; ?>

            

                    </ul>
                    </ul>
                    <?php if (session::get('autenticado')): ?>
                    <ul  class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo session::get('usuario'); ?><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo BASE_URL; ?>recuperar/cambiar">CAMBIAR CONTRASEÑA</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo BASE_URL; ?>login/cerrar">CERRAR SESIÓN</a></li>
                                </ul>
                         </li>
                    </ul>
                <?php endif; ?>

                  

                </div>
            
    </nav>
</div></div>
    <div class="container fondo">

    <div class='botones-sociales derecha hidden-xs hidden-sm hidden-phone hidden-tablet'>
        <a class='itemsocial' href='http://facebook.com' id='facebook-btn' target='_blank'><span class='social'><span class='texto'>Síguenos via Facebook</span></span></a>
        <a class='itemsocial' href='http://twitter.com' id='twitter-btn' target='_blank'><span class='social'><span class='texto'>Síguenos via Twitter</span></span></a>
        <a class='itemsocial' href='http://google.com' id='google-btn' target='_blank'><span class='social'><span class='texto'>Síguenos via Google</span></span></a>
        <a class='itemsocial'href='http://pinterest.com'id='pinterest-btn' target='_blank'><span class='social'>
        <span class='texto'>Síguenos via Pinterest</span></span></a>
        <a class='itemsocial' href='http://youtube.com' id='youtube-btn' target='_blank'><span class='social'><span class='texto'>Síguenos via Youtube</span></span></a>
        <a class='itemsocial' href='url del feed' id='rss-btn' target='_blank'><span class='social'><span class='texto'>Síguenos via RSS</span></span></a>
    </div>
        
    <input type="hidden" value="<?php echo Session::get('role');?>" id="_ROL_">

    <div class="row">



   


        
