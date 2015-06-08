<script type="text/javascript">
	$(document).ready(function(){
        $('.send-newletter').click(function(event){
			event.preventDefault();	
			$.ajax({
				type : 'POST',
				url         : "<?php echo get_bloginfo('url') ?>/wp-admin/admin-ajax.php",
                data        : {
                    action  : 'send_newsletter',
                    value : $('#newsletter').serialize()
                },
				success     : function( data, textStatus, XMLHttpRequest ) {
                	console.log(data); 
                }
			});
		});
    });
</script>
<aside id="sidebar" class="col-xs-10 col-sm-8 col-md-4 col-lg-4" ><!---->
    <center>
        <div style="margin-top:20px;" class="hidden-more-600 img-full">
            <img class="img-responsive img" src="<?php echo get_bloginfo( 'template_url' ).'/images/banner-iphone-reconocimiento.png'; ?>" border=0 />
            <div class="item-banner-atencion bottom-move-down">
                <a href="/atencion-ciudadana/">ATENCIÓN <strong>CIUDADANA</strong></a>
                <div class="clearfix"></div>
            </div>
            <div class="item-banner">
                <a href="http://www.difver.gob.mx/" target="_blank">
                    <img class="img-responsive img" src="<?php echo get_bloginfo( 'template_url' ).'/images/banner_dif_responsive.png'; ?>" border=0 style="margin-bottom:20px"/>
                </a>
                <a class="btn-visitar-sitio color-green" href="#">Visitar sitio</a>
            </div>
            <div class="item-banner">
                <a href="http://fuerzacivil.gob.mx" target="_blank">
                    <img class="img-responsive img" src="<?php echo get_bloginfo( 'template_url' ).'/images/banner_fuerza_civil_responsive.png'; ?>" border=0 style="margin-bottom:20px" />
                </a>
                <a class="btn-visitar-sitio color-green" href="#">Visitar sitio</a>
            </div>
            
           <div class="newsletter bottom-move-down">
                <h4>SUSCRÍBETE A NUESTRO  <i>NEWSLETTER</i></h4>
                <form id="newsletter">
                    <div class="col-md-12">
                        <input type="text" name="email" placeholder="Correo Electrónico">
                        <input type="hidden" name="no-spam"/>
                    </div>
                    <button type="submit" class="send-newletter">ENVIAR</button>
                </form>
            </div>
        </div>
    </center>
    <center>
        <img class="img-responsive img hidden-less-600" src="<?php echo get_bloginfo( 'template_url' ).'/images/banner-reconocimiento-01.png'; ?>" border=0 />
        <div class="item-banner-atencion hidden-less-600">
            <a href="/atencion-ciudadana/">ATENCIÓN <strong>CIUDADANA</strong></a>
            <div class="clearfix"></div>
        </div>
        <div class="item-banner hidden-less-600">
            <a href="http://cuartoinforme.veracruz.gob.mx/" target="_blank">
                <img class="img-responsive img" src="<?php echo get_bloginfo( 'template_url' ).'/img/banner_cuarto_informe.png'; ?>" />
            </a>
            <a class="btn-visitar-sitio color-green" href="#">Visitar sitio</a>
        </div>
        <div class="item-banner hidden-less-600">
            <a href="http://www.difver.gob.mx/" target="_blank">
                <img class="img-responsive img" src="<?php echo get_bloginfo( 'template_url' ).'/img/banner_dif.png'; ?>" />
            </a>
            <a class="btn-visitar-sitio color-green" href="#">Visitar sitio</a>
        </div>
        <div class="item-banner hidden-less-600">
            <a href="http://fuerzacivil.gob.mx" target="_blank">
                <img class="img-responsive img" src="<?php echo get_bloginfo( 'template_url' ).'/img/banner_fuerza_civil.png'; ?>" />
            </a>
            <a class="btn-visitar-sitio color-green" href="#">Visitar sitio</a>
        </div>          
    </center>
    <div class="clearfix"></div>
    <div class="newsletter hidden-less-600">
        <h4>SUSCRÍBETE A NUESTRO  <i>NEWSLETTER</i></h4>
        <form id="newsletter">
            <div class="col-md-12">
                <input type="text" name="email" placeholder="Correo Electrónico">
                <input type="hidden" name="no-spam"/>
            </div>
            <button type="submit" class="send-newletter">ENVIAR</button>
        </form>
    </div>
    <?php
        if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>
                <div class="widget-list widget-newsletter hidden-less-600 hidden-less-320">
                    <h4>SUSCRÍBETE A NUESTRO  <i>NEWSLETTER</i></h4>
                    <?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
                </div>
    <?php endif; ?>
</aside>