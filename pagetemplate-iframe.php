<?php
/*
Template Name: App page
*/
?>
<?php get_header(); ?>
<link href="<?php bloginfo('template_url') ?>/css/transparencia.css" rel="stylesheet">
<script type="application/javascript">
	$(".iframe-responsive").height($(".iframe-responsive").contents().find("html").height());
</script>
<?php get_template_part( 'content', 'search' ); ?>
<div class="tituloSingleArea">
    <h2> 
        <?php echo get_the_title();?>
        <div class="bg-dif-left custom-higth"></div>
        <div class="bg-dif-right custom-higth"></div>
    </h2>
</div>
<div class="container-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12 content-services sin-padding">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="wrap_services">
            <div class="wrap-black-registro hidden-less-600">
             <?php if(is_page('atencion-ciudadana')){?>
             	<img src="<?php bloginfo('template_url') ?>/images/icono_atencion-ciudadana.png" class='img_registro' />
             <?php }else{?>
                <img src="<?php bloginfo('template_url') ?>/images/icono_registro_civil.png" class='img_registro' />
             <?php } ?>
            </div>
            <div class='<?php if(is_page('atencion-ciudadana')){?> change-margen-top <?php } ?>txt_registro_civil '>
                <p><?php the_content(); ?></p>
                <?php
                    $url = get_post_meta($post->ID, 'url', true);
                ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endwhile; endif; ?>
    </div><!--FIN  content-services -->
</div>
<!--<div class='container'>-->
<div class="content_iframe">
    <div class='back_white'>
        <div class="container-fluid">
            <h3 class='titulo_service'>Servicio en línea</h3>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 content-services sin-padding">
            <div class="wrapper_iframe">
                <?php if(is_page('registro-civil')){?>
                    <a class="hidden-less-992 read-more btn-less-600" href="http://oc4jver.veracruz.gob.mx/RegistroCivil/BuscaCostosServlet" target="_blank">Solicitar Aquí</a>
                <?php } else if(is_page('abre-tu-empresa')){ ?>
                    <a class="hidden-less-992 read-more btn-less-600" href="http://destraba.veracruz.gob.mx/" target="_blank">Visitar sitio</a>
                <?php } ?>
                            
                <?php if(is_page('registro-civil')){?>
                    <br />
                <iframe src="<?php print strip_tags($url); ?>" class="iframe-responsive" width="100%" style="height:1403px" frameborder="0" ></iframe>
                <?php }else{ ?>
                <iframe src="<?php print strip_tags($url); ?>" class="iframe-responsive" width="100%" style="height:1350px" frameborder="0" allowtransparency="true" ></iframe>
                <?php } ?>
            </div><!--FIN wrapper_iframe-->
        </div>
    </div>
</div><!--FIN content_iframe-->
<!--</div>-->


<?php get_footer(); ?>