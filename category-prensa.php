<?php
/* Template para la categoria Blog */
?>
<?php get_header(); ?>
<?php $miID=get_the_ID(); ?>
<!--<script src='<?php bloginfo('template_url')?>/js/jquery.min-1.7.1.js' type='text/javascript'></script>-->
<script src="<?php bloginfo('template_url'); ?>/js/newsticker.jquery.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/dark.css"/>
<script type='text/javascript'>
//<![CDATA[
	//jQuery.noConflict();
	jQuery(document).ready(function($) {
		$("#IrArriba").hide();
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 1000) {
					$('#IrArriba').fadeIn();
				} else {
					$('#IrArriba').fadeOut();
				}
			});
			$('#IrArriba a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});
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
							
							var search_var = $(location).attr('search');
							if($.trim(search_var) == ''){
								var link_next = $(location).attr('href');
								nextLink = link_next + 'page/'+ pageNum;
							}else{
								var link_next = $(location).attr('href');
								link_next = link_next.replace(search_var,'');
								nextLink = link_next + 'page/'+ pageNum;
							}
							console.log(search_var);
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
    <div id="content-list" class="container blog-contenedor content-blog blogBuscador fondo-cat-gob">
        <?php
            $nombreCategoria = single_cat_title("", false);
        ?>
        <div class="tituloSingleArea">
            <h2>Sala de Prensa</h2>
        </div>
        <div class="back-img"></div>
        <?php get_template_part( 'content', 'cuentas-twitter' ); ?>
        <div class='cinta-cat-gob-tiempo col-md-12 col-lg-12 hidden-less-600'>
            <div class='pull-left bg-cinta-cat-gob'>
                <span> <?php
                    if( $_GET['p'] == "destacado" ){
                        echo "NOTICIAS DESTACADAS";
                    } else {
                        echo "ÚLTIMAS NOTICIAS";
                    } ?>
                </span>
            </div>
		</div>
        <?php
            $category       = get_cat_slug(get_query_var( 'cat' ));
            $paged          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $sticky         = get_option( 'sticky_posts' );
            wp_reset_query();
            if ( $_GET['p'] == "destacado" ){
                $args       = array(
                    'category_name'         => 'prensa',
                    'paged'                 => $paged
                ); 
            } else {
                $args       = array(
                    'category_name'         => $category,
                    'paged'                 => $paged
                );
            }
            $my_query       = new WP_Query( $args );
            $bus_cont       = 1;
			$cont_break		= 0;
            if ( $my_query->have_posts() ) : ?>
                <div id="content-nota" style="overflow:visible;" class="pagination-params" data-page-max="<?php echo $my_query->max_num_pages; ?>" data-page-start="<?php echo ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; ?>" data-page-next="<?php echo next_posts( $my_query->max_num_pages, false ); ?>" data-page-item=".item-nota">
                    <?php while ( $my_query->have_posts() ) {
                        $my_query->the_post();
                        $my_metaAling   = get_post_meta( $post->ID, '_img_alinear', true );
                        $nuestroAlinear = "";
                        if ( $my_metaAling['alinear'] != "" ) {
                            $nuestroAlinear = $my_metaAling['alinear'];
                        } else {
                            $nuestroAlinear = "cr";
                        }
                        
                        //Obtenemos la url de la imagen destacada
                        $domsxe         = simplexml_load_string( get_the_post_thumbnail( $post->ID, 'full' ) );
                        $thumbnailsrc   = "";
                        if ( !empty( $domsxe ) ) {
                            $thumbnailsrc   = $domsxe->attributes()->src;
                        } else {
                            $urlTema        = get_bloginfo( 'template_url' );
                            $thumbnailsrc   = substr( $urlTema, strrpos( $urlTema, "/wp-" ) , strlen( $urlTema ) ) . "/images/imgDefault.png";
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
                            <?php if ( !empty( $thumbnailsrc ) ) :
							   $img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear ."&w=297&h=142";
							   $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear . "&w=297&h=142";
							   $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear . "&w=345&h=165";
							   $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear . "&w=579&h=277";
							   $img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $nuestroAlinear . "&w=570&h=273"; 
                              ?>
                                <span class="img img-responsive overlay-responsive <?php echo $class; ?>">
                                    <?php $category = get_cat_slug_by_id( $notas->post->ID ); ?>
                                    <a href="<?php the_permalink() ?>" class="over-comsocial list-cat-comsocial">
                                        <div class="overlay-comsocial"></div>
                                        <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change img-back-cat">
                                            <span data-src="<?php echo $img_data_min ?>"></span>
                                            <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                            <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                            <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                            <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>  	
                                        </span>
                                        
                                        <div class="post-date <?php echo $class; ?> hidden-less-600"><?php the_time( 'j M' ); ?></div>
                                    </a>
                                </span>
                            <?php endif; ?>
                            <div class="nota-item-cat-g <?php echo $class; ?>">
                                <div class="nota-item-cat-g-t">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                            the_title();
                                        ?>
                                    </a>
                                    <?php $num_comunicado   = get_post_meta( $post->ID, 'comunicado', true ); ?>
                                    <?php if($num_comunicado != ""){ ?>
                                        <a href="<?php the_permalink() ?>"><h4>COMUNICADO: <?php echo $num_comunicado ?></h4></a>
                                    <?php } ?>
                                </div>
                                <div class="listadoShareItem social_cat_gob">
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
                        <?php if( $bus_cont == 3 ) { ?>
                            <div class="clearfix hidden-less-991"></div>
                            <div class="searchHeaderComuniado hidden-less-991 col-md-12 col-lg-12">
                                <div id="search-4" class="widget-container col-md-4 col-sm-5 col-xs-10 widget_searchComunicado">
                                    <?php include('searchformComunicado.php'); ?>
                                </div>
                            </div>
                            <div class="clearfix hidden-less-991"></div>
                        <?php }
                        $bus_cont++; $cont_break++;
                    } ?>
                </div>
                <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                    <div id="nav-below" class="navigation" style="display:none;">
                        <div class="nav-previous">
                            <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?>
                        </div>
                        <div class="nav-next">
                            <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
                        </div>
                    </div>
                    <p class="posts-loader">
                        <img src="<?php bloginfo( 'template_url' ); ?>/images/loading.gif" />
                    </p>
                <?php endif; ?>
            <?php endif; ?>
    </div>
</div>
<div id='IrArriba'>
    <a href='#Arriba'><span><span/></a>
</div>
<?php get_footer(); ?>