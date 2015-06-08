<?php
/*
Template Name: Dependencias page
*/
?>
<?php get_header(); ?>
<link href="<?php bloginfo('template_url') ?>/css/transparencia.css" rel="stylesheet">
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
                            //nextLink    = nextLink.replace( /\/page\/[0-9]?/, '/page/'+ pageNum);
                            
                            
                            paramsHolder.attr( 'data-page-start', pageNum );
                            paramsHolder.attr( 'data-page-next', nextLink );
                            
                            $( data ).find( item ).appendTo( paramsHolder );
                            
                            loading = false;
                            
                            less_600_remove();
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
                return false;
            });
        }
        
        setPagination( $( '#content-nota' ) );
    });
</script>

<?php get_template_part( 'content', 'search' ); ?>
<div class="tituloSingleArea">
    <h2> 
        Comunicados
        <?php //echo get_the_title();?>
        <div class="bg-dif-left custom-higth"></div>
        <div class="bg-dif-right custom-higth"></div>
    </h2>
</div>

<div class="container-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12 content-services sin-padding">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="wrap_dependencias hidden-less-768">
            <div class="wrap-black-secretaria">
                <?php 
                    if(isset($_GET['cate'])){
                        $cat_name = $_GET['cate'];
                        $path_img = get_bloginfo('template_url').'/images/logos/'.$_GET['cate'].'.png';
                    }else{
                        $cat_name = 'blog';
                        $path_img = get_bloginfo('template_url').'/images/logos/hoja_sala_de_prensa.png';
                    }
                ?>
                <?php 
                    $path = get_bloginfo('template_url');
                    $veracruz = $path.'/images/logos/Veracruz.png';
                    $cge = $path.'/images/logos/CGE.png';
                    $cs = $path.'/images/logos/CS.png';
                    $dif = $path.'/images/logos/DIF.png';
                    $fge = $path.'/images/logos/FGE.png';
                    $pc = $path.'/images/logos/PC.png';
                    $pgj = $path.'/images/logos/PGJ.png';
                    $progob = $path.'/images/logos/PROGOB.png';
                    $sectur = $path.'/images/logos/SECTUR.png';
                    $sedarpa = $path.'/images/logos/SEDARPA.png';
                    $sedecop = $path.'/images/logos/SEDECOP.png';
                    $sedema = $path.'/images/logos/SEDEMA.png';
                    $sedesol = $path.'/images/logos/SEDESOL.png';
                    $sefiplan = $path.'/images/logos/SEFIPLAN.png';
                    $segob = $path.'/images/logos/SEGOB.png';
                    $sev = $path.'/images/logos/SEV.png';
                    $siop = $path.'/images/logos/SIOP.png';
                    $ss = $path.'/images/logos/SS.png';
                    $ssp = $path.'/images/logos/SSP.png';
                    $stsp = $path.'/images/logos/STPSP.png';
                    //Veracruz
                    //IPE
                ?>
                <input type='hidden' class='field_img Veracruz' value='<?php echo $veracruz ?>' />
                <input type='hidden' class='field_img CGE' value='<?php echo $cge ?>' />
                <input type='hidden' class='field_img CS' value='<?php echo $cs ?>' />
                <input type='hidden' class='field_img DIF' value='<?php echo $dif ?>' />
                <input type='hidden' class='field_img cge_img' value='<?php echo $fge ?>' />
                <input type='hidden' class='field_img PC' value='<?php echo $pc ?>' />
                <input type='hidden' class='field_img cge_img' value='<?php echo $pgj ?>' />
                <input type='hidden' class='field_img PROGOB' value='<?php echo $progob ?>' />
                <input type='hidden' class='field_img SECTUR' value='<?php echo $sectur ?>' />
                <input type='hidden' class='field_img SEDARPA' value='<?php echo $sedarpa ?>' />
                <input type='hidden' class='field_img SEDECOP' value='<?php echo $sedecop ?>' />
                <input type='hidden' class='field_img SEDEMA' value='<?php echo $sedema ?>' />
                <input type='hidden' class='field_img SEDESOL' value='<?php echo $sedesol ?>' />
                <input type='hidden' class='field_img SEFIPLAN' value='<?php echo $sefiplan ?>' />
                <input type='hidden' class='field_img SEGOB' value='<?php echo $segob ?>' />
                <input type='hidden' class='field_img SEV' value='<?php echo $sev ?>' />
                <input type='hidden' class='field_img SIOP' value='<?php echo $siop ?>' />
                <input type='hidden' class='field_img SS' value='<?php echo $ss ?>' />
                <input type='hidden' class='field_img SSP' value='<?php echo $ssp ?>' />
                <input type='hidden' class='field_img STPSP' value='<?php echo $stsp ?>' />
                <img src="<?php echo $path_img; ?>" class='img_secretaria' />
            </div>
            <div class='wrap_dependencias_content'>
                <h5 class="subtitulo_dependencia hidden-less-600">Visita por dependencia para ver sus comunicados:</h5>
                <div class="container-fluid wrapper_depe">
                    <?php
                        $category_id = get_cat_ID('Dependencias');
                        $args = array(
                          'show_option_all'    => '',
                          'order' => 'DESC',
                          'hide_empty'         => 0,
                          'hierarchical'       => 1,
                          'parent' => $category_id
                        );
                        $categories = get_categories( $args );
                        $ctrl = 0;
                        $cats = array();
                        foreach ($categories as $category) {
                            $name = $category->name;
                            if($name != 'upav')
                                if( $name != 'spc' )
                                    if ($name != 'sedeco') 
                                        if ($name != 'SECTURC') 
                                            if($name != 'CGCS')
                                                if($name != 'PGJ')
                                                   if($name != 'ipax'){
                                                        $cats[$ctrl] = $name;
                                                        $ctrl++;
                                                   }
                        }
                        $ctrl = 0;
                    ?>
                    <div class="col-md-4">
                        <ul class="dependencias-list">
                        <?php for ($i=0; $i < 7; $i++):  
                            $ctrl ++;
                            $name = $cats[$i];
                        ?>
                            <li class='<?php echo $name; if($cat_name == $name) echo ' active_item'; ?>'>
                                <span class='pleca_right'></span>
                                <a href="/dependencias/?cate=<?php echo $name ?>"><?php echo $name; ?></a>
                            </li>
                        <?php endfor; ?>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="dependencias-list">
                        <?php for ($i=$ctrl; $i < 14; $i++):  
                            $ctrl ++;
                            $name = $cats[$i];
                        ?>
                            <li class='<?php echo $name; if($cat_name == $name) echo ' active_item';?>'>
                                <span class='pleca_right'></span>
                                <a href="/dependencias/?cate=<?php echo $name ?>"><?php echo $name; ?></a>
                            </li>
                        <?php endfor; ?>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="dependencias-list">
                        <?php for ($i=$ctrl; $i < count($cats); $i++):  
                            $ctrl ++;
                            $name = $cats[$i];
                        ?>
                            <li class='<?php echo $name; if($cat_name == $name) echo ' active_item';?>'>
                                <span class='pleca_right'></span>
                                <a href="/dependencias/?cate=<?php echo $name ?>"><?php echo $name; ?></a>
                            </li>
                        <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div><!--FIN wrap_dependencias-->
        <?php endwhile; endif; ?>


        <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="wrap_dependencias_xs hidden-less-480 hidden-more-768 row">
            <div class="wrap-black-secretaria-xs col-sm-6 col-xs-6 ">
                <?php 
                    $path_img_xs = get_bloginfo('template_url').'/images/logos/hoja_sala_de_prensa.png';
                ?>
                <img src="<?php echo $path_img_xs; ?>" class='img_secretaria_xs' />
            </div>
            <div class='wrap_dependencias_content_xs col-sm-6 col-xs-6 no-padding-left-md'>
                <div class="wrap_border_left">
                    <h5 class="subtitulo_dependencia_xs">Visita por dependencia para ver sus comunicados:</h5>
                    <div class="container-fluid wrapper_depe_xs">
                        <?php
                            $category_id = get_cat_ID('Dependencias');
                            $args = array(
                              'show_option_all'    => '',
                              'order' => 'DESC',
                              'hide_empty'         => 0,
                              'hierarchical'       => 1,
                              'parent' => $category_id
                            );
                            $categories = get_categories( $args );
                            $ctrl = 0;
                            $cats = array();
                            foreach ($categories as $category) {
                                $name = $category->name;
                                if($name != 'upav')
                                    if( $name != 'spc' )
                                        if ($name != 'sedeco') 
                                            if ($name != 'SECTURC') 
                                                if($name != 'CGCS')
                                                    if($name != 'PGJ')
                                                       if($name != 'ipax'){
                                                            $cats[$ctrl] = $name;
                                                            $ctrl++;
                                                       }
                            }
                            $ctrl = 0;
                        ?>
                        <div class="col-xs-12">
                            <ul class="dependencias-list">
                            <?php for ($i=0; $i < count($cats); $i++):  
                                $name = $cats[$i];
                            ?>
                                <li class='<?php echo $name; if($cat_name == $name) echo ' active_item';?>'>
                                    <span class='pleca_right'></span>
                                    <a href="/dependencias/?cate=<?php echo $name ?>"><?php echo $name; ?></a>
                                </li>
                            <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                </div><!--FIN wrap_border_left-->
            </div>
            <div class="clearfix"></div>

        </div><!--FIN wrap_dependencias-->
        <?php endwhile; endif; ?>


         <div class="hidden-more-480 wrap_dependencias_xs row">
            <!--<div class="wrap-black-secretaria-xs col-sm-6 col-xs-6 ">
                <?php 
                    //$path_img_xs = get_bloginfo('template_url').'/images/logos/hoja_sala_de_prensa.png';
                ?>
                <img src="<?php echo $path_img_xs; ?>" class='img_secretaria_xs' />
            </div>-->
            <div class='wrap_dependencias_content_xs col-xs-12'>
                <div class="wrap_border_left">
                    <h5 class="subtitulo_dependencia_xs">Visita por dependencia para ver sus comunicados:</h5>
                    <div class="container-fluid wrapper_depe_xs">
                        <?php
                            $category_id = get_cat_ID('Dependencias');
                            $args = array(
                              'show_option_all'    => '',
                              'order' => 'DESC',
                              'hide_empty'         => 0,
                              'hierarchical'       => 1,
                              'parent' => $category_id
                            );
                            $categories = get_categories( $args );
                            $ctrl = 0;
                            $cats = array();
                            foreach ($categories as $category) {
                                $name = $category->name;
                                if($name != 'upav')
                                    if( $name != 'spc' )
                                        if ($name != 'sedeco') 
                                            if ($name != 'SECTURC') 
                                                if($name != 'CGCS')
                                                    if($name != 'PGJ')
                                                       if($name != 'ipax'){
                                                            $cats[$ctrl] = $name;
                                                            $ctrl++;
                                                       }
                            }
                            $ctrl = 0;
                        ?>
                        <div class="col-xs-12">
                            <ul class="dependencias-list">
                            <?php for ($i=0; $i < count($cats); $i++):  
                                $name = $cats[$i];
                            ?>
                                <li class='<?php echo $name; if($cat_name == $name) echo ' active_item';?>'>
                                    <span class='pleca_right'></span>
                                    <a href="/dependencias/?cate=<?php echo $name ?>"><?php echo $name; ?></a>
                                </li>
                            <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                </div><!--FIN wrap_border_left-->
            </div>
            <div class="clearfix"></div>
        </div><!--FIN wrap_dependencias-->


<div class="wrap_grey_xs">
        <div class="search-comunicados-content">
            <div class="conteiner-fluid">
                <div class="col-xs-12">
                    <?php 
                        get_template_part('content', 'form-comunicados');
                    ?>
                </div>
            </div>
        </div><!--FIN search-comunicados-content-->
        <!---->
        <div id="content-list" class="blog-contenedor content-blog blogBuscador blog">
        <?php 
        if(isset($_GET['cate'])){
            $category_name = $_GET['cate'];
            if($category_name == 'Veracruz')
                $category_name = 'blog';
        }else{
            $category_name = 'blog';
        }
        ?>
       <?php
            wp_reset_query();
            $paged          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $sticky         = get_option( 'sticky_posts' );
            $args           = array(
                'category_name'         => $category_name,
                'ignore_sticky_posts'   => 1,
                'post__not_in'          => $sticky,
                'paged'                 => $paged
            );
            $my_query       = new WP_Query( $args );
            $bus_cont       = 1;
            $cont_break     = 0;
            if ( $my_query->have_posts() ) :  
        ?>
    
    <div 
        id="content-nota" 
        class="pagination-params" 
        data-page-max="<?php echo $my_query->max_num_pages; ?>" 
        data-page-start="<?php echo ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; ?>" 
        data-page-next="<?php echo next_posts( $my_query->max_num_pages, false ); ?>" 
        data-page-item=".item-nota">
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
                                        <div class="post-date date-small date-size-fix hidden-less-600"><?php the_time( 'j M' ); ?></div>
                                    </a>
                                </span>
                            <?php endif; ?>
                            <div class="tituloShare">
                                <div class="link-noticia">
                                    <!--<h5 class="time-center hidden-more-600"><?php //the_time( 'j F' ); ?></h5>-->
                                    <h5 class="time-center"><?php the_time( 'j M' ); ?></h5>
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
            <?php endif;
            if ( $my_query->max_num_pages > 1 ) : ?>
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
            <?php endif; wp_reset_query(); ?>
        </div><!--FIN blog-contenedor-->
        <!---->
    </div><!--FIN  content-services -->
    </div><!--FIN wrap_grey_xs-->
</div>
<script type="text/javascript">
    Function.prototype.newMethod = function(name, functional){
        if(!this.prototype[name]){
            this.prototype[name] = functional;
            return this;
        }
    }

    String.newMethod('contains', function(data){
        return(this.indexOf(data)>-1);
    });
    function handlerIn(){
        var logo_dep = $(this).attr('class');
        console.log(logo_dep);
        if(logo_dep.contains('active_item')){
            logo_dep = logo_dep.replace(' active_item', '');
        }
        var path = $('.'+logo_dep).val();
        $('.img_secretaria').attr({
            src: path
        });
    }
    function handlerOut(){
        var default_logo = "<?php bloginfo('template_url') ?>/images/logos/hoja_sala_de_prensa.png";
        $('.img_secretaria').attr('src',default_logo);
    }
    $('.dependencias-list li').hover(handlerIn, handlerOut);
</script>
<?php get_footer(); ?>