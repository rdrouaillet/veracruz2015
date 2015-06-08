<?php 
	get_header();
?>
	<script src='<?php bloginfo('template_url')?>/js/jquery.min-1.7.1.js' type='text/javascript'></script>
    <script type='text/javascript'>
    //<![CDATA[
    // Botón para Ir Arriba
    jQuery.noConflict();
    jQuery(document).ready(function() {
		$('#content-list').delay(3000).fadeIn(1000);  
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
    
    });
    //]]> 
    </script>


    <!---->
    <div id="content-list" class="">
    <?php
        global $wpdb;	
        $variableCom=$_GET['t'];
        $variable_s=$_GET['s'];
        $saberSIENTRO="-";
        if($variableCom=="c"){
            $args = array(
            'meta_query' => array(
                array(
                        'key' => 'comunicado',
                        'value' => $_GET['s'], 
                    )
                ),
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page'    => '9',
            );
            $querystr = "
            SELECT $wpdb->posts.* 
            FROM $wpdb->posts, $wpdb->postmeta
            WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
            AND $wpdb->postmeta.meta_key = 'comunicado' 
            AND $wpdb->postmeta.meta_value = '".$_GET['s']."' 
            AND $wpdb->posts.post_status = 'publish' 
            AND $wpdb->posts.post_type = 'post' GROUP BY  $wpdb->posts.post_title order by $wpdb->posts.ID  DESC LIMIT 50
            ";
            $search = $wpdb->get_results($querystr, OBJECT);
            $total_results = $wpdb->num_rows;
            $saberSIENTRO="SI QUE SI";
        }else if($variableCom!="c"){
            global $query_string, $wp_query;
            $query_args = explode("&", $query_string);
            $search_query = array(
                'posts_per_page'    => '51',
				'no_found_rows' => true, // counts posts, remove if pagination required
				'update_post_term_cache' => false, // grabs terms, remove if terms required (category, tag...)
				'update_post_meta_cache' => false, // grabs post meta, remove if post meta required
            );
            foreach($query_args as $key => $string) {
                $query_split = explode("=", $string);
                $search_query[$query_split[0]] = urldecode($query_split[1]);
            }
            $search = new WP_Query($search_query);
            $total_results = $wp_query->found_posts;
            $saberSIENTRO="NO QUE NO";
        }
        
                
              if($total_results<=0){ ?>
              <div id="up" class="content-search searchHeaderArea hidden-xs pdg-cm-search">
                    <div class="borde-gray2-top "></div>
                    <div class="container-fluid">
                        <div class="w_search_slider col-md-8 col-lg-8 hidden-xs">
                             <?php if($variableCom!="c"){ 
								get_search_form(); 
								} else { 
								get_template_part( 'content', 'form-comunicados-search' ); 
								} ?>
							
                                            
                            </div>
                            <div class="col-md-4 hidden-xs">
                                <div class="social-networks-sld">
                                    <ul>
                                        <li class="sp-fb-png social-stylus-2"><a target="_blank" href="https://es-es.facebook.com/GobiernodeVeracruz"></a></li>
                                        <li class="sp-tw-png social-stylus-2"><a target="_blank" href="https://twitter.com/GobiernoVer"></a></li>
                                        <li class="sp-yt-png social-stylus-2"><a target="_blank" href="http://www.youtube.com/gobiernoveracruz"></a></li>
                                        <li class="sp-pt-png social-stylus-2"><a target="_blank" href="http://www.pinterest.com/estadoveracruz/"></a></li>
                                        <li class="sp-pl-png social-stylus-2"><a target="_blank" href="https://plus.google.com/100491062934580833963/posts"></a></li>
                                        <li class="sp-if-png social-stylus-2"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                 <link href="<?php bloginfo('template_url') ?>/css/transparencia.css" rel="stylesheet">
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
              <?php }else{ ?>
              	<div id="up" class="content-search searchHeaderArea hidden-xs pdg-cm-search">
                    <div class="borde-gray2-top "></div>
                    <div class="container-fluid">
                        <div class="w_search_slider col-md-8 col-lg-8 hidden-xs">
                             <?php if($variableCom!="c"){ 
								get_search_form(); 
								} else { 
								get_template_part( 'content', 'form-comunicados-search' ); 
								} ?>
							
                                            
                            </div>
                            <div class="col-md-4 hidden-xs">
                                <div class="social-networks-sld">
                                    <ul>
                                        <li class="sp-fb-png social-stylus-2"><a target="_blank" href="https://es-es.facebook.com/GobiernodeVeracruz"></a></li>
                                        <li class="sp-tw-png social-stylus-2"><a target="_blank" href="https://twitter.com/GobiernoVer"></a></li>
                                        <li class="sp-yt-png social-stylus-2"><a target="_blank" href="http://www.youtube.com/gobiernoveracruz"></a></li>
                                        <li class="sp-pt-png social-stylus-2"><a target="_blank" href="http://www.pinterest.com/estadoveracruz/"></a></li>
                                        <li class="sp-pl-png social-stylus-2"><a target="_blank" href="https://plus.google.com/100491062934580833963/posts"></a></li>
                                        <li class="sp-if-png social-stylus-2"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
              		
                   
                    <div class="tituloSingleArea">
                        <h2 class="hidden-less-600">
                            <div class='total-search'>
                                Resultados de búsqueda |
                                <span><?php echo " $total_results "; ?></span>
                            </div>
                        </h2>
                        <h2 class="hidden-more-600">
                             <div class='total-search-xs'>
                                Resultados |
                                <span><?php echo " $total_results "; ?></span>
                            </div>
                        </h2>
                        <div class="bg-dif-left custom-higth"></div>
        				<div class="bg-dif-right custom-higth"></div>
                    </div>
                    <div class="back-img"></div>
                <?php 
                $cont_break = 0;
                if($saberSIENTRO=="SI QUE SI"){ ?>
                    <div class="container blog-contenedor content-blog">
                        <div id="content-nota">
                        <?php global $post; ?>
                        <?php foreach ($search as $post){ setup_postdata($post); 
                            
                            /*apply clear both auto*/
                            if( $cont_break % 3 == 0 && $cont_break % 2 == 0){
                                $class = "clear_bloq_cat_gob it-par";
                            }else if($cont_break % 3 == 0){
                                $class = "clear_bloq_cat_gob";
                            }else if( $cont_break %2== 0 ){
                                $class = "it-par";
                            }else{
                                $class = "";
                            } 
                            ?>
                            <div class="<?php echo $class; ?> divNotaListado col-sm-6 col-md-4 col-lg-4 item-nota">
                                <div class="contenedorNota">
                                    <?php
                                    $image_proporcional = get_post_meta($post->ID, 'image_proporcional', true);
                                    $imagen_destacada    = wp_get_attachment_image_src( get_post_thumbnail_id( $data_post->ID ), 'full' );
                                    
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
                                    
                                    if (!empty($thumbnailsrc)){ 
                                        $img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img ."&w=297&h=142";
                                        $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=297&h=142";
                                        $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=345&h=165";
                                        $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=579&h=277";
                                        $img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=570&h=273";
                                        ?>
                                        <span class='img img-responsive overlay-responsive'>
                                            <div class="pretty-img">
                                                <?php $category = get_cat_slug_by_id($notas->post->ID); ?>
                                                <a  href="<?php the_permalink() ?>" class="over-<?php echo $category ?>" data-id="<?php echo $notas->post->ID ?>">
                                                    <div class="overlay-<?php echo $category ?> over-size-nota"></div>
                                                    <span data-picture data-alt="<?php echo get_the_title($nota->ID);?>" class="img img-responsive img-change">
                                                        <span data-src="<?php echo $img_data_min ?>"></span>
                                                        <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                                        <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                                        <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                                        <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span> 	
                                                    </span>
                                                </a>
                                                <div class="post-date date-small hidden-less-600">
                                                    <?php the_time( 'j M' ); ?>
                                                </div>
                                            </div>
                                        </span>
                                     <?php }  ?>
                                     <div class="tituloShare">
                                         <div class="link-noticia">
                                            <h5 class="time-center hidden-more-600"><?php the_time( 'j F' ); ?></h5>
                                            <a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>">
                                                <?php 
                                                    the_title();
                                                ?>
                                            </a>
                                            <?php $num_comunicado = get_post_meta($post->ID, 'comunicado', true); 
                                            if($num_comunicado!=""){ ?>  
                                                <a href="<?php the_permalink() ?>"><br /><span class="comu-search">COMUNICADO:<?php echo $num_comunicado ?> - Año: <?php the_time( 'Y' ); ?></span></a> 
                                            <?php }?>
                                         </div>
                                         <div class="listadoShareItem">
                                             <!-- AddThis Button BEGIN -->
                                             <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-left">
                                                 <span><a class="addthis_button_facebook iconFacebookBlog"></a></span>
                                                 <span><a class="addthis_button_twitter iconTwitterBlog"></a></span>
                                                 <span><a class="addthis_button_linkedin iconLinkedIn"></a></span>
                                                 <span><a class="addthis_button_pinterest_share iconPinterestBlog"></a></span>
                                                 <span><a class="addthis_button_google_plusone_share iconPlusBlog"></a></span>
                                             </div>
                                             <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                                             <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
                                             <!-- AddThis Button END -->
                                         </div>
                                     </div>
                                </div><!-- end .contenedorNota -->
                            </div><!-- Fin del div divNotaListado  -->    
                        <?php $cont_break++; } ?>
                        </div><!--FIN #content-nota-->
                    </div><!--FIN container blog-contenedor content-blog-->
                <?php }else{ ?>
                    <div class="container blog-contenedor content-blog">
                        <div id="content-nota">
                        <?php
                        $cont_break = 0;
                        $cont=1;
                        while ( $search->have_posts()) { 
                            echo $search->the_post(); 
                            /*apply clear both auto*/
                            if( $cont_break % 3 == 0 && $cont_break % 2 == 0){
                                $class = "clear_bloq_cat_gob it-par";
                            }else if($cont_break % 3 == 0){
                                $class = "clear_bloq_cat_gob";
                            }else if( $cont_break %2== 0 ){
                                $class = "it-par";
                            }else{
                                $class = "";
                            } 
                            ?>
                            <div class="<?php echo $class; ?> divNotaListado col-md-4 col-sm-6 col-md-4 col-lg-4 item-nota">
                                <div class="contenedorNota">
                                    <?php
                                    $image_proporcional = get_post_meta($post->ID, 'image_proporcional', true);
                                    $imagen_destacada    = wp_get_attachment_image_src( get_post_thumbnail_id( $data_post->ID ), 'full' );
                                    
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
                                    
                                    if (!empty($thumbnailsrc)){ 
                                        $img_data_1200  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img ."&w=297&h=142";
                                        $img_data_992   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=297&h=142";
                                        $img_data_768   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=345&h=165";
                                        $img_data_600   = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=579&h=277";
                                        $img_data_min  = get_bloginfo( 'template_url' ) . "/timthumb.php?src=" . $thumbnailsrc . "&a=" . $alinear_img . "&w=570&h=273";
                                    ?>
                                        <span class='img img-responsive overlay-responsive'>
                                            <div class="pretty-img">
                                                <?php $category = get_cat_slug_by_id($notas->post->ID); ?>
                                                <a  href="<?php the_permalink() ?>" class="over-<?php echo $category ?>" data-id="<?php echo $notas->post->ID ?>">
                                                    <div class="overlay-<?php echo $category ?> over-size-nota"></div>
                                                    <span data-picture data-alt="<?php echo get_the_title($data_post->ID);?>" class="img img-responsive img-change">
                                                        <span data-src="<?php echo $img_data_min ?>"></span>
                                                        <span data-src="<?php echo $img_data_600 ?>" data-media="(min-width: 600px)"></span>
                                                        <span data-src="<?php echo $img_data_768 ?>" data-media="(min-width: 768px)"></span>
                                                        <span data-src="<?php echo $img_data_992 ?>" data-media="(min-width: 992px)"></span>
                                                        <span data-src="<?php echo $img_data_1200 ?>" data-media="(min-width: 1200px)"></span> 	
                                                    </span>
                                                </a>
                                                <div class="post-date date-small hidden-less-600">
                                                    <?php the_time( 'j M' ); ?>
                                                </div>
                                            </div>
                                        </span>
                                     <?php } ?>
                                     <div class="tituloShare">
                                         <div class="link-noticia">
                                            <h5 class="time-center hidden-more-600"><?php the_time( 'j F' ); ?></h5>
                                            <a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>">
                                                <?php 
                                                    the_title();
                                                ?>
                                             </a>
                                         </div>
                                         <div class="listadoShareItem">
                                             <!-- AddThis Button BEGIN -->
                                             <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-left">
                                                 <span><a class="addthis_button_facebook iconFacebookBlog"></a></span>
                                                 <span><a class="addthis_button_twitter iconTwitterBlog"></a></span>
                                                 <span><a class="addthis_button_linkedin iconLinkedIn"></a></span>
                                                 <span><a class="addthis_button_pinterest_share iconPinterestBlog"></a></span>
                                                 <span><a class="addthis_button_google_plusone_share iconPlusBlog"></a></span>
                                             </div>
                                             <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                                             <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
                                             <!-- AddThis Button END -->
                                         </div>
                                     </div>
                                </div><!-- end .contenedorNota -->
                            </div><!-- Fin del div featured clearfix -->
                        <?php $cont_break++; } 
                        }?>
                    </div><!--FIN #content-nota-->
                    </div><!--FIN container blog-contenedor content-blog-->
            </div>
            <?php } wp_reset_postdata();?>
            <?php if (  $search->max_num_pages > 1 ) : ?>
                    <div id="nav-below" class="navigation" style="display:none;">
                        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
                        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
                    </div> <!-- #nav-below -->
            <?php endif; ?>	
            <!--<center><?php if (function_exists('wp_pagenavi')){ wp_pagenavi(); } ?></center> -->
        </div>
         
        <div id='IrArriba'>
    <a href='#Arriba'><span/></a>
    </div>
<?php
	get_footer();
?>