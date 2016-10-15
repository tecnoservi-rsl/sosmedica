</div>
    </div>
 <section id="pie">
        <div class="container">
        <div class="col-xs-12 col-md-4"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <b> <?php echo APP_SLOGAN ?> </b></div>
        <div class="col-xs-12 col-md-4"><b>Todos los derechos reservados<span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> SOSMEDICA 2016 </b> </div>
        <div class="col-xs-12 col-md-4"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <b> Web developer by <?php echo APP_NAME ?> </b></div>
          
        </div>
    </section>


 <!-- Publicos -->
<script src="<?php echo BASE_URL; ?>public/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/alertify.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/config.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/jquery.validationEngine-es.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/jquery-ui.js" type="text/javascript"></script>


<!-- Bootstrap Core JavaScript -->
 <script src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Plugin JavaScript -->
<!-- Custom Theme JavaScript -->
<!--  Js del layout  -->
 <script src="<?php echo $_layoutParams['ruta_js'];?>header.js" type="text/javascript"></script>
<!--  Js de la vista  -->
<?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
    <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
        <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
    <?php endfor; ?>
<?php endif; ?>

</body>

</html>