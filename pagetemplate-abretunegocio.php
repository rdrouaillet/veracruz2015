<?php
/*
Template Name: Abre tu Negocio
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
            <div class="wrap-black-sedecop hidden-less-600">
                <img src="<?php bloginfo('template_url') ?>/images/sedecop.png" class='img_sedecop' />
            </div>
            <div class='txt_abre_empresa'>
                <div class='content_empresa'>
	                	<?php the_content(); ?>
	                <?php
	                    $url = get_post_meta($post->ID, 'url', true);
	                ?>
	                <div class="wrapper_iframe">
	                	<!--Abre tu empresa-->
		                <a class="hidden-less-992 read-more btn-less-600" href="http://destraba.veracruz.gob.mx/" target="_blank">Visitar sitio</a>
		                <iframe src="<?php print strip_tags($url); ?>" class="iframe-responsive" width="100%" style="height:350px" frameborder="0" allowtransparency="true" ></iframe>
	            	</div><!--FIN wrapper_iframe-->
	          	</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endwhile; endif; ?>
    </div><!--FIN  content-services -->
</div>
<?php get_footer(); ?>