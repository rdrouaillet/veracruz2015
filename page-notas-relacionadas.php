<?php
/*
Template Name: Notas Relacionadas
*/
?>
<?php get_header('cs'); 
?>
<?php $miID=get_the_ID(); ?>
<script src='<?php bloginfo('template_url')?>/js/jquery.min-1.7.1.js' type='text/javascript'></script>
<script src="<?php bloginfo('template_url'); ?>/js/newsticker.jquery.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/dark.css"/>
<script type='text/javascript'>
//<![CDATA[
// Botón para Ir Arriba
jQuery.noConflict();
jQuery(document).ready(function() {
	jQuery("#IrArriba").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 1000) {
			jQuery('#IrArriba').fadeIn();
			} else {
			jQuery('#IrArriba').fadeOut();
			}
		});
	jQuery('#IrArriba a').click(function () {
		jQuery('body,html').animate({
		scrollTop: 0
		}, 800);
		return false;
		});
	});
	jQuery('.widget_searchComunicado form input.search-field').attr('placeholder','Encuentra tu Comunicado');
});
//]]> 
</script>
<script type="text/javascript">
	var addthis_config = {"data_track_addressbar":false};
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
<div id="container">
    <div id="content-list" class="container blog-contenedor content-blog blogBuscador fondo-cat-gob">
		<?php 
        	$nombreCategoria = single_cat_title("", false);
        ?>
        <div class="tituloSingleArea">
            <h2>
                Sala de Prensa
            </h2>
        </div>
        <div class="back-img"></div>
        <?php get_template_part( 'content', 'cuentas-twitter' ); ?>
       	<div class='cinta-cat-gob-tiempo col-md-12 col-lg-12'>
			<div class='pull-left bg-cinta-cat-gob'>
				<span><?php //printf( __( '%s', 'veracruz2013' ),  single_cat_title( '', false )  ); ?>
					Noticias Relacionadas 
				</span>
			</div>
		</div>
		<?php
           wp_reset_query(); 
			global $wpdb, $post;
			$orig_post = $post; 
			$post_id = $_GET['id']; 
			$get_terms= $wpdb->get_var("select wp_veracruz.returnTemrs(post_title) t from gev_posts where id = $post_id;");
			$get_ids_related = $wpdb->get_results("select * from ( select distinct gp.ID, match(gp.post_content) AGAINST ('$get_terms') ratio, post_title, post_date from gev_posts gp where gp.id <> $post_id and gp.post_status = 'publish' and gp.post_type = 'post' order by ratio DESC limit 21) sq where post_title <> (select sgp.post_title from gev_posts sgp where sgp.id = $post_id );");
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            
			$total_results = $wpdb->num_rows;
			$contadorPost=0;
			$cont_p = 1;
			$bus_cont = 1;
			$cont_break = 0;
			if ($total_results>0) :
			echo "<div id='content-nota' style='overflow:visible;'>";
				  global $post;
				  foreach ($get_ids_related as $post): 
					$contadorPost++;
			?>
           
            <?php
   			//Obtenemos la url de la imagen destacada
            $image_proporcional = get_post_meta($post->ID, 'image_proporcional', true);
			$imagen_destacada    = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			
			$alinear   = get_post_meta( $post->ID, '_img_alinear', true );
			if($alinear['alinear'] != "" ) {
				$alinear_img = $alinear['alinear'];
			}else{
				$alinear_img = "cr";
			}
			
			if (!empty($image_proporcional)) {
				$thumbnailsrc = $image_proporcional;
			} else {
				$thumbnailsrc = $imagen_destacada[0];
			}
			
			/*apply clear both auto*/
			if( $cont_break % 3 == 0 && $cont_break % 2 == 0){
				$class = "clear_bloq_cat_gob it-par".$cont_break;
			}else if($cont_break % 3 == 0){
				$class = "clear_bloq_cat_gob";
			}else if( $cont_break %2== 0 ){
				$class = "it-par".$cont_break;
			}else{
				$class = "";
			}
            ?>
            <div class="<?php echo $class; ?> divNotaListado col-sm-6 col-md-4 col-lg-4 item-nota">
                <div class="contenedorNota"> 
                    <?php 
                    if (!empty($thumbnailsrc)):
                        $img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img ."&w=297&h=142";
						$img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=297&h=142";
						$img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=345&h=165";
						$img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=579&h=277";
						$img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=570&h=273";
                        ?>
                        <span class='img img-responsive overlay-responsive'>
                            <?php $category = get_cat_slug_by_id($notas->post->ID); ?>
                            <a href="<?php the_permalink() ?>" class="over-comsocial list-cat-comsocial">
                                <div class="overlay-comsocial"></div>
                                <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change img-back-cat">
                                    <span data-src="<?php echo $img_data_min ?>"></span>
                                    <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                    <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                    <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                    <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span> 	
                                </span>
                                <div class="post-date hidden-less-600"><?php the_time( 'j M' ); ?></div>
                            </a>
                        </span> 
                    <?php endif; ?>
                    <div class="tituloShare">
                        <div class="link-noticia nota-item-cat-g ">
                            <h5 class="time-center hidden-more-600"><?php the_time( 'j F' ); ?></h5>
                            <a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>" style="text-decoration:none;">
                                <?php 
                                    echo get_the_title($data_post->ID);
                                ?>
                            </a>
                           <?php $num_comunicado   = get_post_meta( $post->ID, 'comunicado', true ); ?>
                                    <?php if($num_comunicado != ""){ ?>
                                        <a href="<?php the_permalink() ?>"><h4>COMUNICADO: <?php echo $num_comunicado ?></h4></a>
                                    <?php } ?>
                        </div>
                        <div class="listadoShareItem">
                            <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-left" addthis:url="<?php the_permalink(); ?>">
                                <a class="addthis_button_facebook iconFacebookBlog"></a>
                                <a class="addthis_button_twitter iconTwitterBlog"></a>
                                <a class="addthis_button_linkedin iconLinkedIn"></a>
                                <a class="addthis_button_pinterest_share iconPinterestBlog"></a>
                                <a class="addthis_button_google_plusone_share iconPlusBlog"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--.item-nota-->
	    	<?php if($bus_cont == 3){ ?>
	    		<div class="clearfix"></div>
	    		<div class="searchHeaderComuniado col-md-12 col-lg-12">
					<div id="search-4" class="widget-container col-md-4 col-sm-5 col-xs-10 widget_searchComunicado">
                        <?php include('searchformComunicado.php'); ?>
				    </div>
				</div>
				<div class="clearfix"></div>
	    		<?php } ?>
            <?php
                $cont_p++; $bus_cont++; $cont_break++; 
			 endforeach;
            echo "</div>";
            ?>
	</div>
</div>
<?php 
endif; //Fin de if notas->have_posts
?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div id="nav-below" class="navigation" style="display:none;">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
		</div> <!-- #nav-below -->
<?php endif; ?>	
<div id='IrArribaCom'>
<a href='#Arriba'><span/></a>
</div>
<?php get_footer('cs'); 
?>