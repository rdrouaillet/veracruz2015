<?php
/*
Template Name: Fotonotas Comunicacion Social
*/
?>
<?php get_header(); ?>
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
<script type="text/javascript">
    $( 'document' ).ready( function() {
        var loading = false;
        
        function setPagination( paramsHolder ) {
            var max             = paramsHolder.data( 'page-max' ),
                pageNum         = paramsHolder.data( 'page-start' ) + 1,
                nextLink        = paramsHolder.data( 'page-next' ),
                item            = paramsHolder.data( 'page-item' );
                loader          = $( '.posts-loader' );
            $( '.navigation' ).remove();
            
            $( window ).scroll( function() {
                // Have we reached the bottom of the active element?
                if ( ( ( $( this ).scrollTop() + $( this ).height() ) >= ( paramsHolder.height() + paramsHolder.offset().top ) ) && !loading ) {
                    loading = true;
                    loader.animate({
                        opacity : 1
                    });
                    
                    if ( pageNum <= max ) {
                        $.get( nextLink, function( data ) {
                            loader.animate({
                                opacity : 0
                            });
                            pageNum++;
							var link_next = $(location).attr('href');
							nextLink = link_next + 'page/'+ pageNum;
							console.log(pageNum);
							console.log(nextLink);
							//nextLink    = nextLink.replace( /\/page\/[0-9]?/, '/page/'+ ++pageNum );
                            
							paramsHolder.attr( 'data-page-start', pageNum );
                            paramsHolder.attr( 'data-page-next', nextLink );
                            
                            $( data ).find( item ).appendTo( paramsHolder );
                            
                            loading = false;
                            
                            picturefill();
                            
                            if ( pageNum >= max ) {
                                loader.remove();
                            }
                            
                            // Reinitialize the addthis plugin
                            addthis.toolbox( ".addthis_toolbox" );
                        });
                    } else {
                        $( window ).unbind( 'scroll' );
                    }
                }
            });
        }
        
        setPagination( $( '#content-nota' ) );
    });
</script>
<div id="container">
<?php
get_template_part( 'content', 'search' );
get_template_part( 'content', 'feed-twitter' ); 
?>
<div class="clearfix"></div>
<div class="tituloSingleArea visible-xs">
    <h2>SALA DE PRENSA</h2>
</div>
    <div id="content-list" class="container blog-contenedor content-blog blogBuscador fondo-cat-gob">
		<?php
            wp_reset_query();
			global $wp_query;
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $category = get_cat_slug(get_query_var( 'cat' ));
            $args = array(
				'meta_key'         => 'comunicado',
				'meta_value' => 'fotonota',
				'post_type'        => 'post',
				'posts_per_page'	=> 6, 
				'paged' 			=>$paged 
			);
			$my_query = new wp_query( $args ); 
			//$notas  = new WP_Query( $args );
			$contadorPost=0;
			$cont_p = 1;
			$bus_cont = 1;
			$cont_break = 0;
			?>
            <div id="content-nota" class="pagination-params" data-page-max="<?php echo $my_query->max_num_pages; ?>" data-page-start="<?php echo ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; ?>" data-page-next="<?php echo next_posts( $my_query->max_num_pages, false ); ?>" data-page-item=".item-nota">
            <?php while( $my_query->have_posts() ) {
                $my_query->the_post();
                
                $image_proporcional = get_post_meta($post->ID, 'image_proporcional', true);
                $imagen_destacada    = wp_get_attachment_image_src( get_post_thumbnail_id( $my_query->ID ), 'full' );
                
                $alinear   = get_post_meta( $post->ID, '_img_alinear', true );
                if($alinear['alinear'] != "" ) {
                    $alinear_img = $alinear['alinear'];
                }else{
                    $alinear_img = "cr";
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
                       if (!empty($image_proporcional)) {
                            $thumbnailsrc = $image_proporcional;
                        } else {
                            $thumbnailsrc = $imagen_destacada[0];
                        }
                        
                        if ( !empty( $thumbnailsrc ) ) :
                            $img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img ."&w=297&h=142";
                            $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=297&h=142";
                            $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=345&h=165";
                            $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=579&h=277";
                            $img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=570&h=273";  ?>
                            <span class='img img-responsive overlay-responsive'>
                                <?php $category = get_cat_slug_by_id($notas->post->ID); ?>
                                <a href="<?php the_permalink() ?>" class="over-<?php echo $category ?>">
                                    <div class="overlay-<?php echo $category ?> over-size-nota"></div>
                                    <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                        <span data-src="<?php echo $img_data_min ?>"></span>
                                        <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                        <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                        <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                        <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>  
                                    </span>
                                    <div class="post-date date-small hidden-less-600"><?php the_time( 'j M' ); ?></div>
                                </a>
                            </span>
                        <?php endif; ?>
                        <div class="tituloShare">
                            <div class="link-noticia">
                                <h5 class="time-center hidden-more-600"><?php the_time( 'j F' ); ?></h5>
                                <a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>" style="text-decoration:none;">
                                    <?php 
                                        the_title();
                                    ?>
                                </a>
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
                </div>
            <?php $cont_break++; } ?>
            </div>
            <p class="posts-loader">
                <img src="<?php bloginfo( 'template_url' ); ?>/images/loading.gif" />
            </p>
	</div>
</div>
<div id='IrArriba'>
	<a href='#Arriba'><span><span/></a>
</div>
<?php get_footer(); 
?>