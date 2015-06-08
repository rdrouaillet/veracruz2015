<?php
/*
Template Name: Coordinacion General Comunicacion Social
*/
?>
<?php get_header(); ?>
<link href="<?php bloginfo('template_url') ?>/css/transparencia.css" rel="stylesheet">
<?php get_template_part( 'content', 'search' ); ?>
<div class="tituloSingleArea">
    <h2> 
        Coordinación
        <div class="bg-dif-left custom-higth"></div>
        <div class="bg-dif-right custom-higth"></div>
    </h2>
</div>
<div class="container-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12 content-org sin-padding">
        <span data-picture data-alt="<?php echo $get_foto->post_title ?>" class="img img-responsive img-change">
            <span data-src="<?php echo get_bloginfo('template_url') ?>/images/comunicacion-social/organigrama-mobile.png"></span>
            <span data-src="<?php echo get_bloginfo('template_url') ?>/images/comunicacion-social/Organigrama.png" data-media="(min-width: 600px)"></span>
        </span>
    </div><!--FIN content-org-->
</div><!--FIN container-fluid-->
<?php get_footer(); ?>