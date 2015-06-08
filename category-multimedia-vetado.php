<?php
/* Template para la categoria Blog */
//if (isset($_COOKIE['sitio']) && $_COOKIE['sitio']== 'veracruz') {
	//echo 'hola';
    get_header();
//}else{
	//get_header('cs');
//}
?>
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

        $( "#pretty-img,#fotos .polular-caption,#infografias .polular-caption,#videos .polular-caption" )
        .mouseover(function() {
            console.log('mouseover');
            $( "#fotos .polular-caption,#infografias .polular-caption,#videos .polular-caption" ).css( 'display','none' );
        })
        .mouseout(function() {
            console.log('mouseout');
            $( "#fotos .polular-caption,#infografias .polular-caption,#videos .polular-caption" ).css( 'display', 'block' );
        });
    });
//]]> 
</script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css" />
<noscript>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/fallback.css" />
</noscript>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">	
    $(function() {
        var loading = false;
        
        function setPagination( el ) {
            var paramsHolder    = el.find( '.pagination-params' ),
                max             = paramsHolder.data( 'page-max' ),
                pageNum         = paramsHolder.data( 'page-start' ) + 1,
                nextLink        = paramsHolder.data( 'page-next' ),
                item            = paramsHolder.data( 'page-item' ),
                loader          = el.find( '.posts-loader' );
            
            $( '.navigation' ).remove();
            
            $( window ).scroll( function() {
                // Have we reached the bottom of the active element?
                if ( ( ( $( this ).scrollTop() + $( this ).height() ) >= ( el.height() + el.offset().top ) ) && !loading ) {
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
							
							var hash = $(location).attr('hash');
							
							if($.trim(hash) == ''){
								var link_next = $(location).attr('href');
								nextLink = link_next + 'page/'+ pageNum;
							}else{
								var link_next = $(location).attr('href');
								link_next = link_next.replace(hash,'');
								nextLink = link_next + 'page/'+ pageNum;
							}
							console.log(pageNum);
							console.log(nextLink);
                            
							//nextLink    = nextLink.replace( /\/page\/[0-9]?/, '/page/'+ ++pageNum );
                            paramsHolder.attr( 'data-page-start', pageNum );
                            paramsHolder.attr( 'data-page-next', nextLink );
                            
                            $( data ).find( item ).appendTo( paramsHolder );
                            
                            loading = false;
                            
							less_600_remove();
                            picturefill();
                            
                            if ( pageNum >= max ) {
                                el.find( '.posts-loader' ).remove();
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
        
        $( "#tabs" ).tabs({
            activate        : function( event, ui ) {
                setPagination( ui.newPanel );
                loading = false;
            },
            beforeActivate  : function( event, ui ) {
                $( window ).unbind( 'scroll' );
            }
        });
        
        window.scrollTo( 0, 0 );
        
        var hash    = window.location.hash;
        hash        = ( hash != "" ) ? hash : "#fotos";
        setPagination( $( hash ) );
    });
    
    $( document ).ready( function() {
        $( document ).on( 'click','.item-video', function() {
            var ID = $(this).data('id');
            $.ajax({
                type        : "POST",
                url         : "<?php echo get_bloginfo('url') ?>/wp-admin/admin-ajax.php",
                data        : {
                    action  : 'get_video_ajax',
                    post_id : ID
                },
                beforeSend  :function( data ){
                    $('.video-holder').addClass("loader-ajax");
                },
                success     : function( data, textStatus, XMLHttpRequest ) {
                    $('.video-holder').html( data );
                },
                complete    : function(){
					
                    
					setTimeout( function () {
                        $('.video-holder').removeClass("loader-ajax");
                    }, 2000);
                    var div         = $(".video-holder").offset().top;
                    var masheader   = div - 75 + 'px';
					console.log('llegue aqui');
                    var top         = $( '.video-holder' );
                    $( 'html, body' ).animate({
                        scrollTop   : masheader
                    }, 1000 );
                   
                    //return false;
                },
                error: function(data){
                    //console.log(data.statusText);
                }
            });
        });
        
});
</script>
<!--<script src='<?php //bloginfo('template_url')?>/js/jquery.min-1.7.1.js' type='text/javascript'></script>-->
<div class="tituloSingleArea multi">
    <h2><?php printf( __( '%s', 'veracruz2013' ),  single_cat_title( '', false )  ); ?></h2>
    <div class="bg-dif-left custom-higth"></div>
    <div class="bg-dif-right custom-higth"></div>
</div>
<div id="contenedor_glb_multi" class="container blog-contenedor multimedia gallery-container">
    <div id="tabs">
        <ul>
            <li class="col-xs-1 col-sm-3 col-md-3 cint_tabs">
                <a>T</a>
                <span class="bg-bottom">
            </li>
            <li class="col-xs-3 col-sm-2 col-md-2"></li>
            <li class="col-xs-3 col-sm-2 col-md-2"><a href="#infografias">INFOGRAFÍAS <span class="bg-bottom"></span></a></li>
            <li class="col-xs-3 col-sm-2 col-md-2"></li>
            <li class="col-xs-1 col-sm-3 col-md-3 cint_tabs">
                <a>T</a>
                <span class="bg-bottom">
            </li>
        </ul>
        <div class="clear"></div>
        <div id="infografias" class="">
            <div class="content-slider hidden-less-600">
                <div class="container-fluid">
                    <div id="popular" class="col-sm-12 col-md-12 col-lg-12 img-responsive infography">
                        <?php 
                        $sticky = get_option( 'sticky_posts' );
                        $args   = array(
                            'posts_per_page'        => 1,
                            'post__in'              => $sticky,
                            'ignore_sticky_posts'   => 1,
                            'category_name'         => 'infografias'
                        ); 
                        $notas  = new WP_Query( $args );
                        if ( $notas->have_posts() ) :
                            while($notas->have_posts()) {
                                $notas->the_post();
                                
                                $imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($notas->ID), 'full');
                                $image_proporcional = get_post_meta(get_the_ID(), 'image_proporcional', true);
                                
                                $alinear = get_post_meta($post->ID,'_img_alinear',true);
                                if($alinear['alinear']!=""){            
                                    $alinear_img = $my_metaAling['alinear'];
                                }else{
                                    $alinear_img = "cc";
                                }

                                $proporcion = $image_proporcional;
                                $destacada = $imagen_destacada[0];

                                if ( has_post_thumbnail() ) { 
                                    $img_data_1200   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$destacada."&a=" . $alinear_img . "&w=980&h=357";
                                    $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$destacada."&a=" . $alinear_img . "&w=980&h=357";
                                    $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$destacada."&a=" . $alinear_img . "&w=750&h=273";
                                    $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$proporcion."&a=" . $alinear_img . "&w=700&h=337";
                                    $img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$proporcion."&a=" . $alinear_img . "&w=571&h=275";
                                ?>
                                    <div class="img">
                                        <a href="<?php echo $proporcion; ?>" class="over-infografia infography-link" data-toggle="lightbox" data-gallery="multimedia" data-title="<?php the_title();?>" data-id="<?php echo $notas->ID ?>">
                                            <div class="overlay-infografia"></div>
                                            <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                                <span data-src="<?php echo $img_data_min ?>"></span>
                                                <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                                <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                                <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                                <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="clear"></div>
                                <?php
                                }
                            } ?>
                            <div class="clear"></div>
                        <?php endif; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
            <?php
                get_template_part( 'content', 'search' );
            ?>
            <?php
            $paged3 = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $sticky = get_option( 'sticky_posts' );
            $args   = array(
                'category_name'         => 'infografias',
                'ignore_sticky_posts'   => 1,
                'post__not_in'          => $sticky,
                'paged'                 => $paged3
            );
            $notas  = new WP_Query( $args );
            $cont_break = 0;
            if ( $notas->have_posts() ) : ?>
                <div style="display:none !important" id="content-infografias" class="container-fluid pagination-params" data-page-max="<?php echo $notas->max_num_pages; ?>" data-page-start="<?php echo ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; ?>" data-page-next="<?php echo next_posts( $notas->max_num_pages, false ); ?>" data-page-item=".item-infografia">
                <?php while ( $notas->have_posts() ) {
                    $notas->the_post();
                    
                    $imagen_destacada = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
                    $image_proporcional = get_post_meta(get_the_ID(), 'image_proporcional', true);
                    
                    $alinear = get_post_meta($post->ID,'_img_alinear',true);
                    if($alinear['alinear']!=""){            
                        $alinear_img = $my_metaAling['alinear'];
                    }else{
                        $alinear_img = "cc";
                    }
                    
                    if (!empty($image_proporcional)){
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
                    <div class="<?php echo $class; ?> divNotaListado col-sm-6 col-md-4 col-lg-4 item-infografia">
                        <div class="contenedorNota">
                            <?php
                                if ( !empty( $thumbnailsrc ) ): 
                                    $img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=297&h=143";
                                    $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=297&h=143";
                                    $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=345&h=166";
                                    $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=700&h=337";
                                    $img_data_min   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=".$thumbnailsrc."&a=" . $alinear_img . "&w=571&h=275";
                                    
                                    $img_data_lightbox  = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$alinear_img."&w=900"; ?>
                                    <span class='img img-responsive overlay-responsive'>
                                        <a href="<?php echo $img_data_lightbox; ?>" class="over-infografia infography-link">
                                            <div class="overlay-infografia"></div>
                                            <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                                <span data-src="<?php echo $img_data_min ?>"></span>
                                                <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                                <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                                <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                                <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span>  
                                            </span>
                                        </a>
                                        <div class="post-date date-small hidden-less-600"><?php the_time( 'j M' ); ?></div>
                                    </span>
                                <?php endif; ?>
                                <div class="tituloShare">
                                    <div class="link-noticia">
                                        <h5 class="time-center"><?php the_time( 'j M' ); ?></h5>
                                        <a href="<?php echo $img_data_lightbox; ?>" title="<?php the_title() ?>" class="title over-infografia infography-link">
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
                            </div><!-- end .contenedorNota -->
                    </div>
                <?php $cont_break++; } ?>
                </div>
                <?php if (  $notas->max_num_pages > 1 ) : ?>
                    <div id="nav-below" class="navigation">
                        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
                        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
                    </div>
                    <p class="posts-loader">
                        <img src="<?php bloginfo( 'template_url' ); ?>/images/loading.gif" />
                    </p>
                <?php endif; ?>
            <?php endif; wp_reset_query(); ?>
        </div><!--infografias-->
    </div>
</div>
<div id='IrArriba'>
    <a href='#Arriba'><span/></a>
</div>
<?php
    //if (isset($_COOKIE['sitio']) && $_COOKIE['sitio']== 'veracruz') {
        get_footer();
    //}else{
      //  get_footer('cs');
    //}
?>
