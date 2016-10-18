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
<script src="<?php echo BASE_URL; ?>public/js/jquery.tinycarousel.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/alertify.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/config.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/jquery.validationEngine-es.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/js/redessociales.js" type="text/javascript"></script>

<script src="<?php echo BASE_URL; ?>public/js/jquery.menu-aim.js" type="text/javascript" ></script>
<script>

        var $menu = $(".dropdown-menu");

        // jQuery-menu-aim: <meaningful part of the example>
        // Hook up events to be fired on menu row activation.
        $menu.menuAim({
            activate: activateSubmenu,
            deactivate: deactivateSubmenu
        });
        // jQuery-menu-aim: </meaningful part of the example>

        // jQuery-menu-aim: the following JS is used to show and hide the submenu
        // contents. Again, this can be done in any number of ways. jQuery-menu-aim
        // doesn't care how you do this, it just fires the activate and deactivate
        // events at the right times so you know when to show and hide your submenus.
        function activateSubmenu(row) {
            var $row = $(row),
                submenuId = $row.data("submenuId"),
                $submenu = $("#" + submenuId),
                height = $menu.outerHeight(),
                width = $menu.outerWidth();

            // Show the submenu
            $submenu.css({
                display: "block",
                top: -1,
                left: width - 3,  // main should overlay submenu
                height: height - 4  // padding for main dropdown's arrow
            });

            // Keep the currently activated row's highlighted look
            $row.find("a").addClass("maintainHover");
        }

        function deactivateSubmenu(row) {
            var $row = $(row),
                submenuId = $row.data("submenuId"),
                $submenu = $("#" + submenuId);

            // Hide the submenu and remove the row's highlighted look
            $submenu.css("display", "none");
            $row.find("a").removeClass("maintainHover");
        }

        // Bootstrap's dropdown menus immediately close on document click.
        // Don't let this event close the menu if a submenu is being clicked.
        // This event propagation control doesn't belong in the menu-aim plugin
        // itself because the plugin is agnostic to bootstrap.
        $(".dropdown-menu li").click(function(e) {
            e.stopPropagation();
        });

        $(document).click(function() {
            // Simply hide the submenu on any click. Again, this is just a hacked
            // together menu/submenu structure to show the use of jQuery-menu-aim.
            $(".popover").css("display", "none");
            $("a.maintainHover").removeClass("maintainHover");
        });
    </script>



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