<?php
/*
Template Name: Dependencias page
*/
?>
<?php get_header(); ?>
<link href="<?php bloginfo('template_url') ?>/css/transparencia.css" rel="stylesheet">
<?php get_template_part( 'content', 'search' ); ?>
<div class="container-fluid">
	<div class="col-md-3 col-lg-3"></div>
    <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 content-services sin-padding wrap_404">
    	<img  class="img_404" src="<?php bloginfo('template_url'); ?>/images/page404/404.png" />
    	<a class='btn-back-home' href="/">
    	</a>
	</div>
	<div class="col-md-3 col-lg-3"></div>
</div>
<div class="pleca_bottom hidden-xs"></div>
<div class="pleca_bottom_xs visible-xs"></div>
<div class="clear_div"></div>
<?php get_footer(); ?>