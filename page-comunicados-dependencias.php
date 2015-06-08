<?php
/*
Template Name: Dependencias page Comunicados
*/
?>
<?php get_header(); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/dark.css"/>
<script src="<?php bloginfo('template_url'); ?>/js/newsticker.jquery.js"></script>
<script language="javascript" type="text/javascript">
	function doclick(linkea){
		location.href=linkea;
	}
</script>
<section class="container principalContent" id="content-list">
    <div class="tituloSingleArea">
        <h2>
			<?php
            	//echo get_the_title();//$post->post_parent
            ?>
        sala de prensa
        </h2>
    </div>
    <div class="back-img"></div>
    <?php get_template_part( 'content', 'cuentas-twitter' ); ?>
    <div class='cinta-cat-gob-tiempo col-md-12 col-lg-12 hidden-less-600'>
      <div class='pull-left bg-cinta-cat-gob'><span>comunicados</span></div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 contenedor-pages sin-padding">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="col-md-12 col-lg-12 sin-padding">
            <div class="imagen-dependencias">
                <?php 
                    if ( has_post_thumbnail() ) { 
                       $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID), 'full'); 
                       echo "<img class='img-responsive' src='".$large_image_url[0]."' alt=''>";
                    }
                ?>    
            </div>
            <div class="text-dependencias">
                <div class="content-dependencia"> 
                    <h3>
                        <?php echo get_the_title();
                        //$post->post_parent	?>
                    </h3>
                </div>
                <i><?php the_content(); ?></i>
                <div class="listado-categorias-comunicados col-md-12 col-lg-12 sin-padding">
                    <table align="center" class="col-md-12 col-lg-12 sin-padding">
                        <?php
                        $category_id = get_cat_ID('Dependencias');
                        //$categories = get_categories('child_of=$category_id'); 	
                        $args = array(
                          'show_option_all'    => '',
                          'order' => 'DESC',
                          'hide_empty'         => 0,
                          'hierarchical'       => 1,
                          'exclude'            => '5038,1887,5968,4302,6015', //id category verecruz
                          'parent' => $category_id
                          );
                        $categories = get_categories( $args );
                        foreach ( $categories as $category ) {
                            ?>
                            <div class="categorias-hover">
                              <tr class="categorias-hover-tr" onclick="doclick('<?php echo get_category_link( $category->term_id ); ?>')">
                              <td class="flecha-verde">&nbsp;</td>
                                <td class="link-hover font-mobile" style="padding-right: 6%; padding-left:2%; text-align: center; font-size: 1.700em;">
                                  <span class="flecha-mobile hidden-more-600"></span>
								  <?php echo $category->name; ?>
                                </td>
                                <td class="hidden-less-600" style="padding-top:15px;padding-bottom:15px;">
                                  <?php echo $category->description; ?>
                                </td>
                              </tr>
                            </div>
                            <?php 
                        }
                                         
                        ?>
                    </table>
                </div>
            </div>
        </div>
         <?php endwhile; endif; ?>
    </div>
</section>
<div class="border-bottom"></div>
<?php get_footer(); ?>