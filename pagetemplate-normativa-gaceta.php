<?php
/*
Template Name: Link Page
*/
?>

<?php get_header(); ?>
<?php get_template_part( 'content', 'search' ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php $my_meta = get_post_meta($post->ID,'_normativa_gaceta',true);?>
    <div class="tituloSingleArea">
        <h2><?php the_title(); ?></h2>
    </div>
    <div class="container-fluid">
        <div class="content-normativa">
                <div class="item-normativa">
                    <?php if($my_meta!=''){ ?>	
                    <div class="clear"></div>
                        <!--contenido version iphone-->
                        <?php if($my_meta['image_src']!=""){ ?>
                            <img src="<?php echo esc_url($my_meta['image_src']) ?>" class=" hidden-more-600">
                        <?php } ?>
                        <?php if($my_meta['descripcion_normativa_gaceta']!=""){ ?>
                            <p class="bottom-23 hidden-more-600" style="font-style:italic;"><?php echo esc_html($my_meta['descripcion_normativa_gaceta']); ?></p>
                        <?php } ?>
                        <div class="clear"></div>
                        <?php if($my_meta['url_normativa_gaceta']!=""){ ?>
                            <center><a href="<?php echo esc_url($my_meta['url_normativa_gaceta']); ?>" class="read-more hidden-more-600 btn-less-600" target="_blank">VISITAR SITIO</a></center>
                        <?php } ?>
                        
                        <?php the_content(); ?>
                        
                        <div class="clear"></div>
                        <?php if($my_meta['image_src']!=""){ ?>
                            <img src="<?php echo esc_url($my_meta['image_src']) ?>" class="hidden-less-600">
                        <?php } ?>
                        <?php if($my_meta['descripcion_normativa_gaceta']!=""){ ?>
                            <p class="bottom-23 hidden-less-600" style="font-style:italic;"><?php echo esc_html($my_meta['descripcion_normativa_gaceta']); ?></p>
                        <?php } ?>
                        <div class="clear"></div>
                        <?php if($my_meta['url_normativa_gaceta']!=""){ ?>
                            <center><a href="<?php echo esc_url($my_meta['url_normativa_gaceta']); ?>" class="read-more hidden-less-600" target="_blank">VISITAR SITIO</a></center>
                        <?php } ?>
                    <?php } ?>
                </div>    
                <?php $url = get_post_meta($post->ID, 'url', true); ?>
            <center>
                <?php if(is_page('gaceta-oficial')){?>
                    <iframe src="<?php print strip_tags($url); ?>" class="iframe-responsive" style="height:1350px" width="100%" frameborder="0" ></iframe>
                <?php } ?>
            </center>
        </div>
        <div class="border-solid"></div>
    </div>
<?php endwhile; // end of the loop. ?>
<div class="border-bottom"></div>
<?php get_footer(); ?>