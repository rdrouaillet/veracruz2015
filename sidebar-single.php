<script type="text/javascript">
	jQuery(document).ready(function($) {
		var seen = {};
		$('.unico-post').each(function() {
			var txt = $(this).text();
			if (seen[txt])
				$(this).remove();
			else
				seen[txt] = true;
		});
		
    });
</script>
<aside id="sidebar" class="col-md-4 col-lg-4" >   
	<?php do_action( 'do_get_post_related_sigle_cs'); ?>
    <div class="item-banner hidden-less-600">
        <a href="http://cumbretajin.com/2015/es" target="_blank">
            <img class="img-responsive img" src="<?php echo get_bloginfo( 'template_url' ).'/img/banner_fuerza_civil.png'; ?>" />
        </a>
        <a class="btn-visitar-sitio color-green" href="#">Visitar sitio</a>
    </div>
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
</aside>